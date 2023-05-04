<div>
    <form wire:submit.prevent='store' method="POST" enctype="multipart/form-data" class="mt-2">
        @csrf
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="form-group mt-1">
                    <h5 class="text-uppercase text-primary" for="blog-edit-title">Nama Vendor</h5>
                    <input type="text" wire:model="name" id="name" value="{{ old('name') }}" class="form-control"
                        onInput="edValueKeyPress()">
                </div>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12 col-12">
                <div class="form-group mt-1">
                    <h5 class="text-uppercase text-primary" for="fp-date-time">Alamat</h5>
                    <textarea wire:model="address" class="form-control" id="" rows="3"></textarea>
                </div>
                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-12">
                <div class="form-group mt-1">
                    <h5 class="text-uppercase text-primary" for="blog-edit-title">NPWP</h5>
                    <input type="text" wire:model="npwp" id="npwp" value="{{ old('npwp') }}" class="form-control">
                </div>
                @error('npwp') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-12">
                <div class="form-group mt-1">
                    <h5 class="text-uppercase text-primary" for="blog-edit-title">CP</h5>
                    <input type="text" wire:model="cp" id="cp" value="{{ old('cp') }}" class="form-control">
                </div>
                @error('cp') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 col-12">
                <div class="form-group mt-1">
                    <h5 class="text-uppercase text-primary" for="blog-edit-title">PPN</h5>
                    <input type="text" wire:model="ppn" id="ppn" value="{{ old('ppn') }}" class="form-control">
                </div>
                @error('ppn') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-12 mt-1 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1">Simpan</button>
            </div>
        </div>
    </form>
</div>
