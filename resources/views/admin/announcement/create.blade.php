@extends('layouts.app')
@section('title', 'Pengumuman')
@section('page_title', 'Tambah Pengumuman')
@section('content')
    <div class="card ml-3 mr-3">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Pengumuman</h3>
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

            <form action="{{ route('admin.announcement.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul Pengumuman</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}" required placeholder="Contoh: Pelaksanaan PPDB">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
           

         
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="event_date">Tanggal Mulai</label>
                    <input type="date" class="form-control @error('event_date') is-invalid @enderror" id="event_date"
                        name="event_date" value="{{ old('event_date') }}">
                    @error('event_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                 <div class="form-group">
                    <label for="end_date">Tanggal Berakhir</label>
                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                        name="end_date" value="{{ old('end_date') }}">
                    @error('end_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>


        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </form>
            <a href="{{ route('admin.announcement.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i>
                Batal</a>
        </div>
    @endsection
