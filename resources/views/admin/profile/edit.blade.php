@extends('layouts.app')
@section('title', 'Profil Sekolah')
@section('page_title', 'Edit Profil Sekolah')
@section('content')
    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan error umum --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header">Edit Profil Sekolah</div>
        <div class="card-body">
            <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="school_name">Nama Sekolah</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('school_name', $profile->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="short_name">Nama Singkat</label>
                    <input type="text" name="short_name" id="short_name" class="form-control"
                        value="{{ old('short_name', $profile->short_name) }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea name="address" id="address" class="form-control" rows="3">{{ old('address', $profile->address) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="phone">Telepon</label>
                    <input type="text" name="phone" id="phone" class="form-control"
                        value="{{ old('phone', $profile->phone) }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email', $profile->email) }}">
                </div>
                <div class="form-group">
                    <label for="history">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control-file" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="welcome_message">Kata Sambutan</label>
                    <x-summernote name="welcome_message" id="welcome_message">{{ old('welcome_message', $profile->welcome_message) }}</x-summernote>
                </div>
                <div class="form-group">
                    <label for="history">Sejarah</label>
                    <x-summernote name="history" id="history">{{ old('history', $profile->history) }}</x-summernote>
                </div>
                <div class="form-group">
                    <label for="vision">Visi</label>
                    <x-summernote name="vision" id="vision">{{ old('vision', $profile->vision) }}</x-summernote>
                </div>
                <div class="form-group">
                    <label for="mission">Misi</label>
                     <x-summernote name="mission" id="mission">{{ old('mission', $profile->mission) }}</x-summernote>
                </div>
                <div class="form-group">
                    <label for="mission">Facebook</label>
                    <input type="text" name="facebook" id="facebook" class="form-control"
                        value="{{ old('facebook', $profile->facebook) }}">
                </div>
                <div class="form-group">
                    <label for="mission">Instagram</label>
                    <input type="text" name="instagram" id="instagram" class="form-control"
                        value="{{ old('instagram', $profile->instagram) }}">
                </div>
                <div class="form-group">
                    <label for="mission">Thread</label>
                    <input type="text" name="thread" id="thread" class="form-control"
                        value="{{ old('thread', $profile->thread) }}">
                </div>
                <div class="form-group">
                    <label for="mission">Twitter</label>
                    <input type="text" name="twitter" id="twitter" class="form-control"
                        value="{{ old('twitter', $profile->twitter) }}">
                </div>
                <div class="form-group">
                    <label for="mission">Youtube</label>
                    <input type="text" name="youtube" id="youtube" class="form-control"
                        value="{{ old('youtube', $profile->youtube) }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.profile.index') }}" class="btn btn-secondary">Batal</a>
            </form>
            @endsection
