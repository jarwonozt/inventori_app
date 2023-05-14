<div>
    <ul>
        @foreach (\App\Models\Packing::find($row->id)->products as $item)
        <li><b>{{ $item->name }}</li>
        {{-- <span class="badge badge-primary">{{ $item->name }}</span> --}}
        @endforeach
    </ul>
</div>
