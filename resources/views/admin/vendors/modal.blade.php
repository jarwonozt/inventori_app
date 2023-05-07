<div wire:ignore class="modal fade modal-primary" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Edit Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                            <select class="form-control" wire:model="ppn" id="">
                                <option value="11">PPN</option>
                                <option value="0">NON PPN</option>
                            </select>
                        </div>
                        @error('ppn') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12 mt-1 d-flex justify-content-end">
                        <button type="submit" wire:click.prevent="update()" class="btn btn-primary mr-1">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade text-left modal-primary" id="status-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Update Status 😊</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                Apakah anda yakin ingin update status data tersebut!
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="updateStatus()" type="button" class="btn btn-primary">Ok</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade text-left modal-primary" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">Delete Article 😊</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete permanent the data!
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="deleteStatus()" type="button" class="btn btn-primary">Ok</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
