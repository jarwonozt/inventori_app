<div>
    <ul>
        @foreach (\App\Models\Production::find($row->id)->items as $item)
            <li><b>{{ $item->code }}</b> - {{ $item->name }}</li>
            {{-- <span class="badge badge-primary">{{ $item->name }}</span> --}}
        @endforeach
    </ul>
</div>
