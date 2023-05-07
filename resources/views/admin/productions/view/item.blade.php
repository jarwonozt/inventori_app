<div>
    @foreach (\App\Models\Production::find($row->id)->items as $item)
        <span class="badge badge-primary">{{ $item->name }}</span>
    @endforeach
</div>
