@section('title')
    Tags -
@endsection

<x-master-layouts>
    @include('sweetalert::alert')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            @livewire('article.tags')
        </div>
    </div>
</x-master-layouts>
