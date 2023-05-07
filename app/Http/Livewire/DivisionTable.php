<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Division;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class DivisionTable extends DataTableComponent
{
    use LivewireAlert;

    protected $model = Division::class;
    public $selected_id, $name;

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
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make('Action', 'id')
            ->view('admin.divisions.view.action'),
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
        Division::whereIn('id', $this->getSelected())->delete();
        $this->alert('success', 'Behasil', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Data Divisi berhasil dihapus.',
            ]);
    }

    public function openModalEdit($id)
    {
        $this->selected_id = $id;
        $data = Division::findOrFail($id);
        $this->name = $data->name;
        $this->dispatchBrowserEvent('openModalEdit');
    }

    public function update()
    {
        $save = Division::findOrFail($this->selected_id);
        $save->name = $this->name;
        $save->save();

        session()->flash('message', 'Divisi berhasil update.');

        return redirect()->route('divisions.index');
    }

    public function deleteModal($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('openModalDelete');
    }

    public function deleteStatus(){
        Division::findOrFail($this->selected_id)->delete();
        $this->dispatchBrowserEvent('closeModalDelete');
    }

    public function customView(): string
    {
        return 'admin.divisions.modal';
    }
}
