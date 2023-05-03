@section('title')
    Posts -
@endsection

<x-master-layouts>

@include('sweetalert::alert')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-7 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Articles</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Article List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-5 col-12">
                <div class="form-group">
                    <a href="{{ route('articles.create') }}" class="btn-icon btn btn-primary btn-round"><i data-feather="edit"></i> Create New Article</a>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card p-1">
                        <div class="row" id="table-hover-row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">
                                        <livewire:articles-table></livewire:articles-table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <livewire:user-table></livewire:user-table> --}}
                    </div>
                </div>
            </div>
            @include('admin.article.modal')
            @include('admin.modals.alert')
        </div>
    </div>
</div>
@push('custom-scripts')
<script>
    window.addEventListener('success', event => {
        $("#successAlert").modal('show');
        $("#message").html(event.detail.message);

    });
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

    window.addEventListener('openModalDelete', event => {
        $("#delete-modal").modal('show');
    });

    window.addEventListener('closeModalDelete', event => {
        $("#delete-modal").modal('hide');
    });
</script>
@endpush

</x-master-layouts>
