@extends('layouts.app')
@section('title', 'Kategori Prestasi')
@section('page_title', 'Kategori Prestasi')
@section('content')
    <div class="card ml-3 mr-3">
<div class="card-header">
    <h3 class="card-title">Form Tambah Kategori Prestasi</h3>
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
    <form action="{{ route('admin.category-achievement.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
             @error('name')
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
    </div>
@endsection