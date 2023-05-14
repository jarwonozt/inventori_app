<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Item;
use App\Models\Production;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.productions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.productions.create', [
            'divisions' => Division::all(),
            'items' => Item::where('qty', '>', 0)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'division_origin' => 'required',
            'target_division' => 'required',
            'item_id' => 'required',
        ]);

        $dataItem = json_encode($request->item_id);
        // dd($dataItem);
        try {
            $production = Production::create([
                'name' => $request->name,
                'target_division' => $request->target_division,
                'division_origin' => $request->division_origin,
                'item_id' => $dataItem,
                'description' => $request->description,
                'status' => 1,
                'created_by' => auth()->user()->id,
            ]);

            if($production){
                Alert::success('Ditambahkan', 'Data Produksi berhasil ditambhakan.');
                return redirect()->route('productions.index');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
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
