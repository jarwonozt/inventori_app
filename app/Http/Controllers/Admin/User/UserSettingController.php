<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserSettingController extends Controller
{
    public function index()
    {
        return view('admin.users.settings.index', [
            'user' =>  User::findOrFail(auth()->user()->id)
        ]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // dd($request->image);
        $imageName = null;
        try {
            $user = User::findOrFail($id);

            if($request->image != null){
                $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg|max:1048',
                ]);

                $imageName = time().'.'.$request->image->extension();
                $request->image->storeAs('public/images/users/',$imageName);

                if(Storage::disk('public')->exists('images/users/'.$user->profile_photo_path)) {
                    Storage::disk('public')->delete('images/users/'.$user->profile_photo_path);
                }
            }


            $input  = $request->except(['_token', 'company', 'image']);

            if($imageName != null){
                $user->profile_photo_path = $imageName;
            }

            $user->fill($input)->save();

            Alert::success('Success', 'User added successfully');
            return redirect()->route('userssetting.index');
        } catch (Exception $error) {
            Alert::error('Error', $error->getMessage());
            return redirect()->route('userssetting.index');
        }
    }

    public function destroy($id)
    {
        //
    }

    public function changePassword(Request $request){

    }
}
