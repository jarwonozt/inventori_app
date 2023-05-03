<?php

namespace App\Exports;

use App\Models\Post\PostArticles;
use Maatwebsite\Excel\Concerns\FromCollection;

class ArticleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $selectedKey = [];

    public function __construct($id)
    {
        $this->selectedKey = $id;
    }

    public function collection()
    {
        return PostArticles::whereIn('id', $this->selectedKey)->get();
    }
}
