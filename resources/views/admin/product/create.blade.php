@extends('layouts.app')
@section('title', 'Produk')
@section('page_title', 'Daftar Produk')
@section('content')
    <div class="card ml-2 mr-2">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Produk</h3>
        </div>
        <div class="card-body">
            {{-- Pesan error umum --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}" placeholder="Masukkan nama produk" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">

                    <label for="image">Foto Produk</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image"
                            name="image" accept="image/*">
                        <label class="custom-file-label" for="image">Pilih Foto Produk</label>
                        @error('image')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
         
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" value="{{ old('price') }}" placeholder="Masukkan Harga" required>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="contact_person">Nara Hubung</label>
                    <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                        id="contact_person" name="contact_person" value="{{ old('contact_person') }}"
                        placeholder="62123456789" required>
                    @error('contact_person')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <x-summernote name="description" id="description">{{ old('description') }}</x-summernote>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Unit</label>
                    <select class="form-control @error('unit_id') is-invalid @enderror" id="unit" name="unit"
                        required>
                        <option value="">Pilih Unit</option>
                        <option value="pcs">pcs</option>
                        <option value="kg">kg</option>
                        <option value="ons">ons</option>
                        <option value="liter">liter</option>
                        <option value="box">box</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gallery">Galeri</label>
                    {{-- <div class="custom-file"> --}}
                    <input type="file" class="form-control-file @error('gallery.*') is-invalid @enderror" id="gallery"
                        name="gallery[]" accept="image/*" multiple>
                    {{-- <label class="custom-file-label" for="gallery[]">Pilih Foto Produk</label> --}}
                    @error('gallery.*')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- </div> --}}
                </div>

        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save mr-1"></i> Simpan</button>
            <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-secondary"><i
                    class="fas fa-times mr-1"></i>Batal</a>
            </form>
        </div>

    @endsection

    @section('scripts')
    <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
        <script>
            const input = document.getElementById('price');

            input.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, "");
                if (value) {
                    value = new Intl.NumberFormat('id-ID').format(value);
                }
                this.value = value ? "Rp " + value : "";
            });


            $(function () {
            bsCustomFileInput.init();
            });
        </script>
    @endsection
