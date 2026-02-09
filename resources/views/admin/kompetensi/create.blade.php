@extends('layouts.app')
@section('title', 'Kompetensi Keahlian')
@section('page_title', 'Tambah Kompetensi Keahlian')
@section('content')
    <div class="card ml-3 mr-3">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Kompetensi Keahlian</h3>
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

            <form action="{{ route('admin.kompetensi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Kompetensi Keahlian</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}" required placeholder="Contoh: Teknik Komputer dan Jaringan">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              

                <div class="form-group">
                    <label for="image">Logo Kompetensi Keahlian</label>
                    <input type="file" class="form-control-file @error('logo') is-invalid @enderror" id="image"
                        name="logo" accept="image/*">
                    @error('logo')
                        <span class="invalid-feedback d-block" role="alert">
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
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </form>
            <a href="{{ route('admin.kompetensi.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i>
                Batal</a>
        </div>
    @endsection
