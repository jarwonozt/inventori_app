@section('title')
    Edit Barang -
@endsection

<x-master-layouts>
    @include('sweetalert::alert')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-7 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h3 class="content-header-title float-left mb-0">Edit Barang</h3>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('items.index') }}">Data Barang</a>
                                    </li>
                                    <li class="breadcrumb-item active">Edit Barang</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <div class="alert-body"><strong>Harap isi data seusuai nama kolom dan pastikan data sudah benar sebelum disimpan.</strong></div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <div class="alert-body"><strong>Input angka tidak boleh menggunakan karakter titik (.) atau koma (,)</strong></div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="card">
                                <form class="form" method="POST" enctype="multipart/form-data"
                                    action="{{ route('items.update', $data->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-xl-4 col-12">
                                                <div class="form-group">
                                                    <h5 class="text-primary">Pilih Vendor</h5>
                                                    <select class="select2 form-control" name="vendor_id">
                                                        <option selected disabled>--Silahkan Pilih---</option>
                                                        <option value="{{ $vendor->id }}" {{ $vendor->id == $data->vendor_id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-8 col-xl-8 col-12 d-flex justify-content-end"
                                                style="padding-left:150px;">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <h5 class="text-primary">No D.O</h5>
                                                            <input type="number" name="no_do" id="no_do"
                                                                class="form-control " autocomplete="off"
                                                                placeholder="Nomor D.O" value="{{ $data->no_do }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group mb-2">
                                                            <h5 class="text-primary">Tanggal Masuk</h5>
                                                            <input type="text" name="entry_date" id="fp-date-time"
                                                                class="form-control flatpickr-date-time"
                                                                placeholder="YYYY-MM-DD HH:MM" value="{{ $data->entry_date }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group mb-2">
                                                            <h5 class="text-primary">Tanggal D.O</h5>
                                                            <input type="text" name="do_date" id="fp-date-time"
                                                                class="form-control flatpickr-date-time"
                                                                placeholder="YYYY-MM-DD HH:MM" value="{{ $data->do_date }}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12 mb-2">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th class="text-primary">Kode Barang</td>
                                                            <th class="text-primary">Nama Barang</th>
                                                            <th class="text-primary">Qty</th>
                                                            <th class="text-primary">Satuan</th>
                                                            <th class="text-primary">Harga</th>
                                                            <th class="text-primary">PPN/NON PPN</th>
                                                            <th class="text-primary">Diskon</th>
                                                            <th class="text-primary"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="add-volume">
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="code" id="code"
                                                                    class="form-control " autocomplete="off"
                                                                    placeholder="Kode Barang" value="{{ $data->code }}">
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="name" id="name"
                                                                    class="form-control " autocomplete="off"
                                                                    placeholder="Nama Barang" value="{{ $data->name }}">
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="qty" id="qty"
                                                                    class="form-control " autocomplete="off"
                                                                    placeholder="0" value="{{ $data->qty }}">
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                            <td>
                                                                <select class="form-control" name="unit" id="">
                                                                    <option value="pcs" {{ $data->unit == 'pcs' ? 'selected' : '' }}>PCS</option>
                                                                    <option value="set" {{ $data->unit == 'set' ? 'selected' : '' }}>SET</option>
                                                                    <option value="dus" {{ $data->unit == 'dus' ? 'selected' : '' }}>DUS</option>
                                                                    <option value="pak" {{ $data->unit == 'pak' ? 'selected' : '' }}>PAK</option>
                                                                    <option value="gram" {{ $data->unit == 'gram' ? 'selected' : '' }}>GRAM</option>
                                                                    <option value="kg" {{ $data->unit == 'kg' ? 'selected' : '' }}>KG</option>
                                                                    <option value="k" {{ $data->unit == 'k' ? 'selected' : '' }}>KUINTAL</option>
                                                                    <option value="ton" {{ $data->unit == 'ton' ? 'selected' : '' }}>TON</option>
                                                                </select>
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="price" id="price"
                                                                    class="form-control " autocomplete="off"
                                                                    placeholder="0" value="{{ $data->price }}">
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                            <td>
                                                                <select class="form-control" name="ppn" id="">
                                                                    <option value="11" {{ $data->ppn > 0 ? 'selected' : '' }}>PPN</option>
                                                                    <option value="0" {{ $data->ppn == 0 ? 'selected' : '' }}>NON PPN</option>
                                                                </select>
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="discount"
                                                                    class="form-control" placeholder="0" value="{{ $data->discount }}" />
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                            <td><button type="text" class="btn btn-secondary btn-add" disabled><i
                                                                        class="fa fa-ban"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="code_new[]" id="code" class="form-control " autocomplete="off" placeholder="Kode Barang" value="">
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="name_new[]" id="name" class="form-control " autocomplete="off" placeholder="Nama Barang" value="">
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="qty_new[]" id="qty" class="form-control " autocomplete="off" placeholder="0" value="0">
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                            <td>
                                                                <select class="form-control" name="unit_new[]" id="">
                                                                    <option value="pcs">PCS</option>
                                                                    <option value="set">SET</option>
                                                                    <option value="dus">DUS</option>
                                                                    <option value="pak">PAK</option>
                                                                    <option value="gram">GRAM</option>
                                                                    <option value="kg">KG</option>
                                                                    <option value="k">KUINTAL</option>
                                                                    <option value="ton">TON</option>
                                                                </select>
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="price_new[]" id="price" class="form-control " autocomplete="off" placeholder="0" value="0">
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                            <td>
                                                                <select class="form-control" name="ppn_new[]" id="">
                                                                    <option value="11">PPN</option>
                                                                    <option value="0">NON PPN</option>
                                                                </select>
                                                                <div class="invalid-feedback"></div>
                                                            </td><td>
                                                                <input type="number" name="discount_new[]" class="form-control" placeholder="0" value="0" />
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                            <td><button type="text" class="btn btn-success btn-add"><i class="fa fa-plus"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mt-1">
                                                    <h5 class="text-primary" for="fp-date-time">Deskripsi</h5>
                                                    <textarea name="description" class="form-control" id=""
                                                        rows="3">{{ $data->description }}</textarea>
                                                </div>
                                                @error('description') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 text-right">
                                                <div class="form-group border rounded p-1">
                                                    <button type="submit" class="btn btn-primary mr-1">Simpan</button>
                                                    <a href="{{ route('items.index') }}"
                                                        class="btn btn-outline-primary mr-1">Batal</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


    @push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    @endpush

    @push('page-js')
    <script src="{{ asset('assets') }}/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="{{ asset('assets') }}/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="{{ asset('assets') }}/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="{{ asset('assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{ asset('assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
    <script src="{{ asset('assets/js/scripts/forms/form-number-input.js')}}"></script>
    <script>
        $(function () {
            var changePicture = $('#change-picture'),
                userAvatar = $('.user-avatar'),
                languageSelect = $('#users-language-select2'),
                form = $('.form-validate'),
                birthdayPickr = $('.birthdate-picker');

            // Change user profile picture
            if (changePicture.length) {
                $(changePicture).on('change', function (e) {
                var reader = new FileReader(),
                    files = e.target.files;
                reader.onload = function () {
                    if (userAvatar.length) {
                    userAvatar.attr('src', reader.result);
                    }
                };
                reader.readAsDataURL(files[0]);
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".btn-add").click(function(e) {
                e.preventDefault();
                let html = '<tr>';
                html += '<td>';
                html += '<input type="text" name="code_new[]" id="code" class="form-control " autocomplete="off" placeholder="Kode Barang" value="">';
                html += '<div class = "invalid-feedback"> </div>';
                html += '</td>';
                html += '<td>';
                html += '<input type="text" name="name_new[]" id="name" class="form-control " autocomplete="off" placeholder="Nama Barang" value="">';
                html += '<div class = "invalid-feedback"> </div>';
                html += '</td>';
                html += '<td>';
                html += '<input type="number" name="qty_new[]" id="qty" class="form-control " autocomplete="off" placeholder="0" value="0">';
                html += '<div class = "invalid-feedback"> </div>';
                html += '</td>';
                html += '<td>';
                html += '<select class="form-control" name="unit_new[]" id="">';
                html += '<option value="pcs">PCS</option>';
                html += '<option value="set">SET</option>';
                html += '<option value="dus">DUS</option>';
                html += '<option value="pak">PAK</option>';
                html += '<option value="gram">GRAM</option>';
                html += '<option value="kg">KG</option>';
                html += '<option value="k">KUINTAL</option>';
                html += '<option value="ton">TON</option>';
                html += '</select>'
                html += '</td>';
                html += '<td>';
                html += '<input type="number" name="price_new[]" id="price" class="form-control " autocomplete="off" placeholder="0" value="0">';
                html += '<div class = "invalid-feedback"> </div>';
                html += '</td>';
                html += '<td>';
                html += '<select class="form-control" name="ppn_new[]" id="">';
                html += '<option value="11">PPN</option>';
                html += '<option value="0">NON PPN</option>';
                html += '</select>';
                html += '<div class = "invalid-feedback"> </div>';
                html += '</td>';
                html += '<td>';
                html += '<input type="number" name="discount_new[]" id="discount" class="form-control " autocomplete="off" placeholder="0" value="0">';
                html += '<div class = "invalid-feedback"> </div>';
                html += '</td>';

                html += '<td><button type="text" class="btn btn-danger btn-remove"><i class="fa fa-times"></i></button></td>';
                html += '</tr>';
                $('#add-volume').append(html);
            });

            $(document).on('click', '.btn-remove', function(e) {
                e.preventDefault();
                $(this).parents('tr').remove();
                s
            })
        });
    </script>
    @endpush
    </x-master-layout>
