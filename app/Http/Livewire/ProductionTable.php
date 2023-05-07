<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Production;

class ProductionTable extends DataTableComponent
{
    protected $model = Production::class;
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
            Column::make("Nama", "name")
                ->searchable(),
            Column::make("Divisi", "getDivision.name"),
            Column::make('Bahan', 'id')
                ->view('admin.productions.view.item'),
            Column::make("Tanggal Produksi", "created_at")
                ->sortable(),
            Column::make('Action', 'id')
            ->view('admin.productions.view.action'),
        ];
    }

    public function deleteSelectedConfirm(){
        $this->alert('warning', 'Peringatan', [
            'position' => 'center',
            'timer' => '',
            'toast' => false,
            'timerProgressBar' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'deleteSelected',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonText' => 'Batal',
            'confirmButtonText' => 'Hapus',
            'text' => 'Apakah yakin anda akan menghapus data produksi ?',
            ]);
    }

    public function deleteSelected()
    {
        Production::whereIn('id', $this->getSelected())->delete();
        $this->alert('success', 'Behasil', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Data Porduksi berhasil dihapus.',
            ]);
    }


    public function deleteModal($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('openModalDelete');
    }

    public function deleteStatus(){
        Production::findOrFail($this->selected_id)->delete();
        $this->dispatchBrowserEvent('closeModalDelete');
    }

    public function customView(): string
    {
        return 'admin.productions.modal';
    }
}
