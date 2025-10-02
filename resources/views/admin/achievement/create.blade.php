@extends('layouts.app')
@section('title', 'Prestasi')
@section('page_title', 'Tambah Prestasi')
@section('content')
    <div class="card ml-3 mr-3">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Prestasi</h3>
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

            <form action="{{ route('admin.achievement.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul Prestasi</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}" required placeholder="Contoh: Juara 1 LKS Tingkat Provinsi">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <select class="form-control" @error('category') is-invalid @enderror" id="category_achievement_id" name="category_achievement_id"
                        required>
                        <option value="">Pilih:</option>
                        @foreach ($category_achievements as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Gambar Sampul</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                        name="image" accept="image/*">
                    @error('image')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Juara [peringkat] [nama lomba] Tingkat [tingkat lomba], [penyelenggara], [tahun].">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="published_at">Tanggal Publikasi</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        name="date" value="{{ old('date') }}">
                    @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>



        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </form>
            <a href="{{ route('admin.achievement.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i>
                Batal</a>
        </div>
    @endsection
