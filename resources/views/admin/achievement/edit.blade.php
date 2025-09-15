@extends('layouts.app')
@section('title', 'Prestasi')
@section('page_title', 'Edit Prestasi')
@section('content')

    <div class="card ml-3 mr-3">
        <div class="card-header">
            <h3 class="card-title">Form Edit Prestasi</h3>
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

            <form action="{{ route('admin.achievement.update',$achievement->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Judul Prestasi</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ $achievement->title }}" required placeholder="Contoh: Juara 1 LKS Tingkat Provinsi">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <select class="form-control" @error('category') is-invalid @enderror" id="category" name="category"
                        required>
                        <option value="">Pilih:</option>
                        <option value="LKS" {{ $achievement->category == 'LKS' ? 'selected' : '' }}>LKS</option>
                        <option value="Olah Raga" {{ $achievement->category == 'Olah Raga' ? 'selected' : '' }}>Olah Raga</option>
                        <option value="Ekstrakurikuler" {{ $achievement->category == 'Ekstrakurikuler' ? 'selected' : '' }}>
                            Ekstrakurikuler</option>
                    </select>

                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Gambar Sampul</label>
                      @if($achievement->image)
                        <div class="mb-2">
                            <img src="{{asset('storage/'.$achievement->image)}}" alt="Gambar Berita" class="img-fluid" style="max-height: 200px;">
                        </div>
                    @endif
                    
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
                    <textarea name="description" id="description" class="form-control" placeholder="Juara [peringkat] [nama lomba] Tingkat [tingkat lomba], [penyelenggara], [tahun].">{{$achievement->description}}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="published_at">Tanggal Pengumuman</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        name="date" value="{{ $achievement->date ? $achievement->date->format('Y-m-d') : '' }}"
>
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
