@extends('layouts.app')
@section('title', 'Link')
@section('page_title', 'Edit Link')
@section('content')
    <div class="card ml-2 mr-2">
        <div class="card-header">
            <div class="text-right">
                <a href="{{ route('admin.link.index') }}" class="btn btn-secondary"><i
                        class="fas fa-arrow-left"></i>&nbsp;Kembali</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.link.update', $link->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Link</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $link->name }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">    
                    <label for="url">URL</label>
                    <input type="url" name="url" id="url" class="form-control" value="{{ $link->url }}" required>
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">    
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active" class="form-control" required>
                        <option value="1" {{ $link->is_active ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ !$link->is_active ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                    @error('is_active')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;Simpan</button>
                <a href="{{ route('admin.link.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i>&nbsp;Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection