@extends('layouts.app')
@section('title', 'Produk')
@section('page_title', 'Edit Produk')
@section('styles')
<style>
.gallery-item {
    position: relative;
}

.gallery-item img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    border-radius: 8px;
}

.gallery-remove {
    position: absolute;
    top: 5px;
    right: 5px;
    background: rgba(0,0,0,.6);
    color: white;
    border: none;
    border-radius: 50%;
    width: 26px;
    height: 26px;
    font-size: 14px;
    cursor: pointer;
}
</style>

@endsection
@section('content')
    <div class="card ml-2 mr-2">
        <div class="card-header">
            <h3 class="card-title">Form Edit Produk</h3>
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
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Foto Produk" class="img-fluid mb-3 rounded" style="max-height: 100px;">
                    </div>
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
                        name="price" value="{{ old('price', $product->price) }}" placeholder="Masukkan Harga" required>
                    @error('price')
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
                        <option value="pcs" {{ old('unit', $product->unit) == 'pcs' ? 'selected' : '' }}>pcs</option>
                        <option value="kg" {{ old('unit', $product->unit) == 'kg' ? 'selected' : '' }}>kg</option>
                        <option value="ons" {{ old('unit', $product->unit) == 'ons' ? 'selected' : '' }}>ons</option>
                        <option value="liter" {{ old('unit', $product->unit) == 'liter' ? 'selected' : '' }}>liter</option>
                        <option value="box" {{ old('unit', $product->unit) == 'box' ? 'selected' : '' }}>box</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stock">Stok</label>
                    <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                        name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Masukkan Stok Produk" required>
                    @error('stock')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="contact_person">Nara Hubung</label>
                    <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                        id="contact_person" name="contact_person" value="{{ old('contact_person', $product->contact_person) }}"
                        placeholder="62123456789" required>
                    @error('contact_person')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <x-summernote name="description" id="description">{{ old('description', $product->description) }}</x-summernote>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

        <div class="form-group">
            <label>Galeri Produk</label>

            <div class="gallery-upload border rounded p-3">
                <input type="file"
                    id="galleryInput"
                    name="gallery[]"
                    class="d-none"
                    accept="image/*"
                    multiple>

                <button type="button" class="btn btn-outline-primary mb-3" 
                    onclick="document.getElementById('galleryInput').click()">
                    + Tambah Foto
                </button>

                <small class="text-muted d-block mt-1">
                    Maksimal 5 foto. Format JPG, PNG. Maks 2MB per foto.
                </small>

                <div id="galleryPreview" class="row g-2"></div>
            </div>

            @error('gallery.*')
                <small class="text-danger d-block mt-1">{{ $message }}</small>
            @enderror
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

            function formatRupiah(value) {
    value = value.replace(/\D/g, "");
    if (!value) return "";
    return "Rp " + new Intl.NumberFormat('id-ID').format(value);
}

document.querySelector("form").addEventListener("submit", function () {
    input.value = input.value.replace(/\D/g, '');
});


// FORMAT SAAT USER KETIK
input.addEventListener('input', function() {
    this.value = formatRupiah(this.value);
});


const MAX_FILES = 5;

const galleryInput = document.getElementById('galleryInput');
const galleryPreview = document.getElementById('galleryPreview');

let existingImages = @json($product->gallery ?? []);
let newFiles = [];

// ===== RENDER AWAL =====
renderGallery();

galleryInput.addEventListener('change', function (e) {
    for (let file of e.target.files) {
        if ((existingImages.length + newFiles.length) >= MAX_FILES) {
            alert('Maksimal 5 foto galeri');
            break;
        }
        newFiles.push(file);
    }
    renderGallery();
});

// ===== RENDER GALLERY =====
function renderGallery() {
    galleryPreview.innerHTML = '';

    // Render existing images
    existingImages.forEach((image, index) => {
        const col = document.createElement('div');
        col.className = 'col-6 col-md-3 gallery-item';

        col.innerHTML = `
            <img src="/storage/${image}">
            <button type="button" 
                class="gallery-remove" 
                onclick="removeExisting(${index})">×</button>
            <input type="hidden" name="old_gallery[]" value="${image}">
        `;
        galleryPreview.appendChild(col);
    });

    // Render new files
    newFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function (e) {
            const col = document.createElement('div');
            col.className = 'col-6 col-md-3 gallery-item';

            col.innerHTML = `
                <img src="${e.target.result}">
                <button type="button" 
                    class="gallery-remove" 
                    onclick="removeNew(${index})">×</button>
            `;
            galleryPreview.appendChild(col);
        };
        reader.readAsDataURL(file);
    });

    syncInputFiles();
}

// ===== HAPUS EXISTING =====
function removeExisting(index) {
    existingImages.splice(index, 1);
    renderGallery();
}

// ===== HAPUS NEW =====
function removeNew(index) {
    newFiles.splice(index, 1);
    renderGallery();
}

// ===== SYNC FILE INPUT =====
function syncInputFiles() {
    const dataTransfer = new DataTransfer();
    newFiles.forEach(file => dataTransfer.items.add(file));
    galleryInput.files = dataTransfer.files;
}


        </script>
    @endsection
