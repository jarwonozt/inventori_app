<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Admin\Configuration;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Image;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.configuration', [
            'data' => Configuration::orderBy('created_at')->first(),
            'users' => User::where('status', 1)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $logoOld    = Configuration::first()->logo;
        $pathLogo   = '/storage/assets/'.$logoOld;
        // dd($request);
        if($request->logo != null){

            if (file_exists(public_path($pathLogo))) {
                unlink(public_path($pathLogo));
            }

            $validator = Validator::make($request->all(), [
                'logo'=>'image|mimes:jpeg,png,jpg',
            ]);

            if($validator->fails()) {
                Alert::toast($validator->errors()->first(), 'error');
                return redirect()->back();
            }

            $image = $request->file('logo');
            $imageName = time().'.'.$image->extension();

            $destinationPath = public_path('/storage/assets');
            $img = Image::make($image->path());
            $img->resize(228, 36, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
        }

        try {
            $config = Configuration::findOrFail(1);
            $config->name = $request->name;
            $config->tags = $request->tags;
            $config->description = $request->description;

            if($request->logo != null){
                $config->logo = $imageName;
            }

            $config->owner_id = $request->owner_id;
            $config->created_by = auth()->user()->id;
            $config->address = $request->address;
            $config->email = $request->email;
            $config->whatsapp = $request->whatsapp;
            $config->instagram = $request->instagram;
            $config->facebook = $request->facebook;
            $config->twitter = $request->twitter;
            $config->tiktok = $request->tiktok;
            $config->status = 1;

            $config->save();

            Alert::success('Success', 'Configuration updated successfully...');
            return back();
        } catch (Exception $error) {
            dd($error->getMessage());
            Alert::toast($error->getMessage(), 'error');
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
