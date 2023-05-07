<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Packing;

class PackingTable extends DataTableComponent
{
    protected $model = Packing::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()->isHidden(),
            Column::make("Produk", "getProduction.name"),
            Column::make("Status", "status"),
            Column::make("Tanggal", "created_at")
                ->sortable(),
            Column::make('Action', 'id')
            ->view('admin.packings.view.action'),
        ];
    }
}
