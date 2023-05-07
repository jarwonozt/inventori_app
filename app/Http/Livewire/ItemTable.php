<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Item;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ItemTable extends DataTableComponent
{
    use LivewireAlert;

    protected $model = Item::class;
    public $selected_id;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    protected $listeners = [
            'deleteSelected',
        ];

    public array $bulkActions = [
            'deleteSelectedConfirm' => 'Delete',
        ];

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()->isHidden(),
            Column::make("Kode", "code"),
            Column::make("Nama", "name")->searchable(),
            Column::make("Vendor", "getVendor.name"),
            Column::make("Qty", "qty"),
            Column::make("Satuan", "unit"),
            Column::make("Harga", "price")
            ->format(function($value) {
                return number_format($value);
            }),
            Column::make('PPN', 'ppn')
            ->format(function($value, $column, $row) {
                if($value == 11){
                    $data = '<span class=\'badge badge-success\'>PPN</span>';
                }else{
                    $data = '<span class=\'badge badge-secondary\'>Non PPN</span>';
                }

                return $data;
            })->html(),
            Column::make("Diskon", "discount")
            ->format(function($value) {
                return $value.'%';
            }),
            Column::make("Total", "total")
            ->format(function($value) {
                return number_format($value);
            }),
            Column::make('Action', 'id')
            ->view('admin.items.view.action'),
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
            'text' => 'Apakah yakin anda akan menghapus data vendor ?',
            ]);
    }

    public function deleteSelected()
    {
        Item::whereIn('id', $this->getSelected())->delete();
        $this->alert('success', 'Behasil', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Data Vendor berhasil dihapus.',
            ]);
    }


    public function deleteModal($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('openModalDelete');
    }

    public function deleteStatus(){
        Item::findOrFail($this->selected_id)->delete();
        $this->dispatchBrowserEvent('closeModalDelete');
    }

    public function customView(): string
    {
        return 'admin.vendors.modal';
    }
}
