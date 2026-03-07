@extends('layouts.app')
@section('title', 'Menu')
@section('page_title', 'Edit Menu')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Menu</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $menu->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="route" class="form-label">Route</label>
                    <input type="text" name="route" id="route" class="form-control @error('route') is-invalid @enderror" value="{{ old('route',$menu->route) }}" required>
                    @error('route')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="icon" class="form-label">Icon (Font Awesome)</label>
                    <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $menu->icon) }}">
                    @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- order -->
                 <div class="mb-3">
                    <label for="order" class="form-label">Urutan</label>
                    <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', $menu->order) }}" required>
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                 </div>

                 <!-- aktif/tidak aktif -->
                  <div class="mb-3">
                    <libel for="is_active" class="form-label">Aktif</label>
                    <select name="is_active" id="is_active" class="form-control @error('is_active') is-invalid @enderror" required>
                        <option value="1" {{ old('is_active', $menu->is_active) == '1' ? 'selected' : '' }}>Ya</option>
                        <option value="0" {{ old('is_active', $menu->is_active) == '0' ? 'selected' : '' }}>Tidak</option>
                    </select>
                    @error('is_active')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                        </div>
            <div class="card-footer text-right">
                <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>    
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>
@endsection
