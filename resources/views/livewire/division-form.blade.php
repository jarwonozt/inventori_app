<div>
    <form wire:submit.prevent='store' method="POST" enctype="multipart/form-data" class="mt-2">
        @csrf
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="form-group mt-1">
                    <h5 class="text-uppercase text-primary" for="blog-edit-title">Nama Divisi</h5>
                    <input type="text" wire:model="name" id="name" value="{{ old('name') }}" class="form-control">
                </div>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-12 mt-1 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1">Simpan</button>
            </div>
        </div>
    </form>
</div>
