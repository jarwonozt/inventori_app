<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Vendor;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class VendorTable extends DataTableComponent
{
    use LivewireAlert;

    protected $model = Vendor::class;
    public $selected_id;
    public $name, $address, $npwp, $cp, $ppn;

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
            Column::make('Nama Vendor', 'name')->searchable(),
            Column::make('Alamat', 'address')->searchable(),
            Column::make('NPWP', 'npwp'),
            Column::make('CP', 'cp'),
            Column::make('PPN', 'ppn'),
            Column::make('Action', 'id')
            ->view('admin.vendors.view.action'),
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
        Vendor::whereIn('id', $this->getSelected())->delete();
        $this->alert('success', 'Behasil', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Data Vendor berhasil dihapus.',
            ]);
    }

    public function openModalEdit($id)
    {
        $this->selected_id = $id;
        $data = Vendor::findOrFail($id);
        $this->name = $data->name;
        $this->address = $data->address;
        $this->npwp = $data->npwp;
        $this->cp = $data->cp;
        $this->ppn = $data->ppn;
        $this->dispatchBrowserEvent('openModalEdit');
    }

    public function update()
    {
        $save = Vendor::findOrFail($this->selected_id);
        $save->name = $this->name;
        $save->address = $this->address;
        $save->npwp = $this->npwp;
        $save->cp = $this->cp;
        $save->ppn = $this->ppn;
        $save->save();

        session()->flash('message', 'Vendor berhasil update.');

        return redirect()->route('vendors.index');
    }

    public function deleteModal($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('openModalDelete');
    }

    public function deleteStatus(){
        Vendor::findOrFail($this->selected_id)->delete();
        $this->dispatchBrowserEvent('closeModalDelete');
    }

    public function customView(): string
    {
        return 'admin.vendors.modal';
    }
}
