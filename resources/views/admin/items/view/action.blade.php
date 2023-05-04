<div class="content-header-right">
    <div class="dropdown">
        <button class="btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-chevron-circle-down font-medium-3"></i></button>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#" wire:click="openModalEdit({{ $row->id }})">
                <i class="fa fa-pencil"></i>
                <span class="align-middle">Edit</span>
            </a>
            <a type="button" class="dropdown-item" wire:click="deleteModal({{ $row->id }})">
                <i class="fa fa-trash-o"></i>
                <span class="align-middle">Delete</span>
            </a>
        </div>
    </div>
</div>
