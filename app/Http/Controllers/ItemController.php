<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.items.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.items.create', [
            'vendors' => Vendor::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $count = count($request->code);
        $request->validate([
            'code' => 'required|unique:items',
            'name' => 'required',
            'qty' => 'required',
            'unit' => 'required',
            'price' => 'required',
            // 'ppn' => 'required',
            'discount' => 'required',
            'no_do' => 'required',
            'entry_date' => 'required',
            'do_date' => 'required',
        ]);
        // dd($count);
        for ($i=0; $i < $count; $i++) {
            if($request->discount[$i] > 0)
            {
                $discount[$i] = $request->discount[$i]/100 * ($request->qty[$i] * $request->price[$i]);

            }
            // dd($discount[$i]);
            $item[$i] = Item::create([
                'vendor_id' => $request->vendor_id,
                'code' => $request->code[$i],
                'name' => $request->name[$i],
                'qty' => $request->qty[$i],
                'unit' => $request->unit[$i],
                'price' => $request->price[$i],
                'ppn' => $request->ppn[$i],
                'discount' => $request->discount[$i],
                'total' => $request->discount[$i] > 0 ? $request->qty[$i] * $request->price[$i] - $discount[$i] : $request->qty[$i] * $request->price[$i],
                'description' => $request->description,
                'created_by' => auth()->user()->id,
                'no_do' => $request->no_do,
                'entry_date' => $request->entry_date,
                'do_date' => $request->do_date,
            ]);

        }

        Alert::success('Success', 'Data Barang berhasil disimpan.');
        return redirect()->route('items.index');
        // try {
        // } catch (Exception $e) {
        //     //throw $th;
        // }
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
