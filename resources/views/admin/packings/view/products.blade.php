<div>
    @foreach (\App\Models\Packing::find($row->id)->productions as $item)
        <span class="badge badge-primary">{{ $item->name }}</span>
    @endforeach
</div>
