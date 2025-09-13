@extends('layouts.app')
@section('title', 'Berita')
@section('page_title', 'Tambah Berita')
@section('content')
    <div class="card ml-3 mr-3">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Berita</h3>
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

            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                        name="image" accept="image/*">
                    @error('image')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="content">Konten</label>
                    <x-summernote name="content" id="content">{{ old('content') }}</x-summernote>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="published_at">Tanggal Publikasi</label>
                    <input type="date" class="form-control @error('published_at') is-invalid @enderror" id="published_at"
                        name="published_at" value="{{ old('published_at') }}">
                    @error('published_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <small class="form-text text-muted">Kosongkan jika ingin menyimpan sebagai draft.</small>
                </div>
             

            
</div>
   <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Batal</a>
                </div>
        @endsection
