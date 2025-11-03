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
                        name="name" value="{{ old('name', $product->name) }}" placeholder="Masukkan nama produk" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">

                    <label for="image">Foto Produk</label>
                    @if($product->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Foto Produk" class="img-fluid mb-2" style="max-height: 200px;">

                    </div>
                    @endif
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
                        name="price" value="{{ old('price',$product->price) }}" placeholder="Masukkan Harga" required>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="contact_person">Nara Hubung</label>
                    <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                        id="contact_person" name="contact_person" value="{{ old('contact_person',$product->contact_person) }}"
                        placeholder="62123456789" required>
                    @error('contact_person')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <x-summernote name="description" id="description">{{ old('description',$product->description) }}</x-summernote>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Unit</label>
                    <select class="form-control @error('unit') is-invalid @enderror" id="unit" name="unit"
                        required>
                        <option value="">Pilih Unit</option>
                        <option value="pcs" @if ($product->unit=='pcs') selected @endif>pcs</option>
                        <option value="kg" @if ($product->unit=='kg') selected @endif>kg</option>
                        <option value="ons" @if ($product->unit=='ons') selected @endif>ons</option>
                        <option value="liter" @if ($product->unit=='liter') selected @endif>liter</option>
                        <option value="box" @if ($product->unit=='box') selected @endif>box</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gallery">Galeri</label>
                   
                    @if($product->gallery)
                        <div class="mb-2">
                            <div class="row">
                                @foreach (json_decode($product->gallery, true) as $image)
                                    <div class="d-inline mb-2">
                                        <img src="{{ asset('storage/'.$image) }}" alt="Gallery image" class="img-thumbnail" width="120" height="120" style="object-fit: cover; object-position: center; border-radius: 8px;">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
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
