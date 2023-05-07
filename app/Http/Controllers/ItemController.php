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
                'status' => 1,
            ]);

        }

        Alert::success('Success', 'Data Barang berhasil disimpan.');
        return redirect()->route('items.index');
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
        $data = Item::findOrFail($id);
        return view('admin.items.edit', [
            'data' => $data,
            'rows' => Item::where('vendor_id', $data->vendor_id)->get(),
            'vendors' => Vendor::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $count = $request->code_new != null ? count($request->code_new) : null;
        if($request->discount > 0)
            {
                $discount = $request->discount/100 * ($request->qty * $request->price);

            }
        // dd($count);
        $item = Item::where('id', $id)->update([
                'vendor_id' => $request->vendor_id,
                'code' => $request->code,
                'name' => $request->name,
                'qty' => $request->qty,
                'unit' => $request->unit,
                'price' => $request->price,
                'ppn' => $request->ppn,
                'discount' => $request->discount,
                'total' => $request->discount > 0 ? $request->qty * $request->price - $discount : $request->qty * $request->price,
                'description' => $request->description,
                'created_by' => auth()->user()->id,
                'no_do' => $request->no_do,
                'entry_date' => $request->entry_date,
                'do_date' => $request->do_date,
                'status' => 1,
            ]);

        if($count > 0){
            for ($i=0; $i < $count; $i++) {
                if($request->discount_new[$i] > 0)
                {
                    $discount_new[$i] = $request->discount_new[$i]/100 * ($request->qty_new[$i] * $request->price_new[$i]);

                }
                // dd($request->code_new);

                if($request->code_new[$i] != null){
                    $item[$i] = Item::create([
                        'vendor_id' => $request->vendor_id,
                        'code' => $request->code_new[$i],
                        'name' => $request->name_new[$i],
                        'qty' => $request->qty_new[$i],
                        'unit' => $request->unit_new[$i],
                        'price' => $request->price_new[$i],
                        'ppn' => $request->ppn_new[$i],
                        'discount' => $request->discount_new[$i],
                        'total' => $request->discount_new[$i] > 0 ? $request->qty_new[$i] * $request->price_new[$i] - $discount_new[$i] : $request->qty_new[$i] * $request->price_new[$i],
                        'description' => $request->description,
                        'created_by' => auth()->user()->id,
                        'no_do' => $request->no_do,
                        'entry_date' => $request->entry_date,
                        'do_date' => $request->do_date,
                        'status' => 1,
                    ]);
                }

            }
        }

        Alert::success('Success', 'Data Barang berhasil disimpan.');
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
