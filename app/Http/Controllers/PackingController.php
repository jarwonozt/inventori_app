<?php

namespace App\Http\Controllers;

use App\Models\Packing;
use App\Models\Production;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.packings.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.packings.create', [
            'productions' => Production::where('status', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'code' => 'required',
            'production_id' => 'required',
        ]);

        $dataProduction = json_encode($request->production_id);
        try {
            Packing::create([
                'code' => $request->code,
                'production_id' => $dataProduction,
                'description' => $request->description,
                'status' => 1,
            ]);

            Alert::success('Ditambahkan', 'Data Packing berhasil ditambhakan.');
            return redirect()->route('packings.index');
        } catch (Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
