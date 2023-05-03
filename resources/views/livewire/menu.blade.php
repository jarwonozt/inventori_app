<div>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-5 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h3 class="content-header-title float-left mb-0">Menu</h3>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Admin</a>
                                    </li>
                                    <li class="breadcrumb-item active">List Menu
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-7">
                    <div class="form-group breadcrumb-right">
                        <button wire:click.prevent="create" class="btn btn-primary">Buat Menu</button>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="content-body">
                    @if (session()->has('message'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <div class="alert-body"><strong>{{ session('message') }}</strong></div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <section id="all-post">
                        <div class="card card-company-table">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Url</th>
                                                <th>Oleh</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($row as $item)
                                            @if ($item->parent_id == 0)
                                            <tr>
                                                <td scope="row">
                                                    @if (!$item->parent_id)
                                                    <span class="badge badge-pill badge-light-primary">{{ $item->order }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->parent_id)
                                                    <span class="badge badge-pill badge-light-warning">{{ $item->order }}</span>
                                                    @endif
                                                    <strong class="text-primary">{!! $item->name !!}</strong>
                                                </td>
                                                <td>{{ $item->slug }}</td>
                                                <td class="text-center">
                                                    <div class="avatar-group">
                                                        <a href="#">
                                                            <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="{!! 'Ditambahkan: '.$item->getAdd->name !!}">
                                                                <img src="{{ $item->getAdd->profile_photo_path ? $item->getAdd->photo : $item->getAvatar($item->getAdd->name) }}" alt="Avatar" height="32" width="32" />
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Action">
                                                        @if($item->order != 1)
                                                        <button wire:click.prevent="moveUp({{ $item->id }})" class="btn btn-primary" title="Up"><i data-feather="chevron-up"></i></button>
                                                        @endif
                                                        @if($item->order != $row->count())
                                                        <button wire:click.prevent="moveDown({{ $item->id }})" class="btn btn-primary" title="Down"><i data-feather="chevron-down"></i></button>
                                                        @endif
                                                        <button wire:click.prevent="edit({{ $item }})" class="btn btn-primary" title="Edit"><i data-feather="edit-2"></i></button>
                                                        <button wire:click.prevent="delete({{ $item->id }})" class="btn btn-primary" title="Delete"><i data-feather="trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                            @foreach ($row as $value)
                                            @if($value->parent_id == $item->id)
                                            <tr>
                                                <td scope="row">
                                                    @if (!$value->parent_id)
                                                    <span class="badge badge-pill badge-light-primary">{{ $value->order }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($value->parent_id)
                                                    <span class="badge badge-pill badge-light-warning">{{ $value->order }}</span>
                                                    @endif
                                                    <span class="text-primary">{!! $value->name !!}</span>
                                                </td>
                                                <td>{{ $value->slug }}</td>
                                                {{-- <td class="text-center">
                                                    <span class="badge badge-light-primary">{{ $value->getParent($value->parent_id) }}</span>
                                                </td> --}}
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="#">
                                                            <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="{!! 'Ditambahkan: '.$value->getAdd->name !!}">
                                                                <img src="{{ $item->getAdd->profile_photo_path ? $item->getAdd->photo : $item->getAvatar($item->getAdd->name) }}" alt="Avatar" height="32" width="32" />
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Action">
                                                        @if($value->order != 1)
                                                        <button wire:click.prevent="moveUp({{ $value->id }})" class="btn btn-primary" title="Up"><i data-feather="chevron-up"></i></button>
                                                        @endif
                                                        @if($value->order != $row->count())
                                                        <button wire:click.prevent="moveDown({{ $value->id }})" class="btn btn-primary" title="Down"><i data-feather="chevron-down"></i></button>
                                                        @endif
                                                        <button wire:click.prevent="edit({{ $value }})" class="btn btn-primary" title="Edit"><i data-feather="edit-2"></i></button>
                                                        <button wire:click.prevent="delete({{ $value->id }})" class="btn btn-primary" title="Delete"><i data-feather="trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach

                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <img src="{{ asset('assets/empty.svg') }}" alt="" width="100">
                                                    </div>
                                                    <h4 class="text-muted">Ups! Tidak ditemukan 😳</h4>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.modals.menu-modal')

@push('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/vendors.min.css">
@endpush
@push('page-js')
    <script>
        window.addEventListener('show-form', event => {
            $('#form').modal('show');
        })
        window.addEventListener('hide-form', event => {
            $('#form').modal('hide');
        })
        window.addEventListener('show-status', event => {
            $('#status').modal('show');
        })
        window.addEventListener('hide-status', event => {
            $('#status').modal('hide');
        })
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            Livewire.hook('message.processed', (message, component) => {
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            })
        });
    </script>
@endpush
</div>
