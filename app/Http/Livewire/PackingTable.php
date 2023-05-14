<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Packing;

class PackingTable extends DataTableComponent
{
    protected $model = Packing::class;
    public $selected_id;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()->isHidden(),
            Column::make("Kode", "code"),
            Column::make('Produk', 'id')
                ->view('admin.packings.view.products'),
            Column::make("Tanggal", "created_at")
                ->sortable(),
            Column::make('Action', 'id')
            ->view('admin.packings.view.action'),
        ];
    }

    public function deleteModal($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('openModalDelete');
    }

    public function deleteStatus(){
        Packing::findOrFail($this->selected_id)->delete();
        $this->dispatchBrowserEvent('closeModalDelete');
    }

    public function customView(): string
    {
        return 'admin.packings.modal';
    }
}
