<?php

namespace App\Http\Livewire;

use App\Models\Division;
use App\Models\Vendor;
use Carbon\Carbon;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Str;

class DivisionForm extends Component
{
    use LivewireAlert;

    public $name;

    protected $rules = [
        'name' => 'required|unique:divisions',
    ];

    public function store()
    {
        $this->validate();
        Division::create([
            'code' => 'DV-'.Carbon::now()->format('dmyHis'),
            'name' => strtoupper($this->name),
            'status' => 1,
            'created_by' => auth()->user()->id,
        ]);

        // $this->alert('success', 'Vendor berhasil disimpan.', [
        //     'position' => 'top-end',
        //     'timer' => 3000,
        //     'toast' => true,
        // ]);

        session()->flash('message', 'Divisi berhasil ditambahkan.');

        return redirect()->route('divisions.index');
    }

    public function render()
    {
        return view('livewire.division-form');
    }

}
