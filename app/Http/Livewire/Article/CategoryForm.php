<?php

namespace App\Http\Livewire\Article;

use App\Models\Post\PostAction;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CategoryForm extends Component
{
    use LivewireAlert;

    public $name;

    protected $rules = [
        'name' => 'required|unique:categories',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveCategory()
    {
        $validatedData = $this->validate();
        // dd($validatedData);
        PostAction::category($this->name);

        $this->alert('success', 'Category add successfully');
        $this->dispatchBrowserEvent('loadModalCreate');
    }

    public function render()
    {
        return view('livewire.article.category-form');
    }
}
