<?php

namespace App\Http\Livewire;

use App\Models\Vendor;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class VendorForm extends Component
{
    use LivewireAlert;

    public $name, $address, $npwp, $cp, $ppn;

    protected $rules = [
        'name' => 'required|unique:vendors',
        'address' => 'required',
        'npwp' => 'required',
        'cp' => 'required',
    ];

    public function store()
    {
        $this->validate();
        // dd($this->ppn);
        Vendor::create([
            'name' => $this->name,
            'address' => $this->address,
            'npwp' => $this->npwp,
            'cp' => $this->cp,
            'ppn' => $this->ppn,
            'status' => 1,
            'created_by' => auth()->user()->id,
        ]);

        // $this->alert('success', 'Vendor berhasil disimpan.', [
        //     'position' => 'top-end',
        //     'timer' => 3000,
        //     'toast' => true,
        // ]);

        session()->flash('message', 'Vendor berhasil ditambahkan.');

        return redirect()->route('vendors.index');
    }

    public function render()
    {
        return view('livewire.vendor-form');
    }

}
