@extends('layouts.app')
@section('title', 'Prestasi')
@section('page_title', 'Tampil Prestasi')
@section('content')
    <div class="card ml-2 mr-2">
        <div class="card-header">
            <h3 class="card-title">{{$achievement->title}}</h3>
            
            <div class="card-tools">
                <a href="{{ route('admin.achievement.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                <a href="{{ route('admin.achievement.edit', $achievement->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                <form action="{{ route('admin.achievement.destroy', $achievement->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button> 
                </form>
            
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if ($achievement->image)
                        <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}"
                            class="img-fluid mb-3">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" alt="No Image" class="img-fluid mb-3">
                    @endif
                </div>
                <div class="col-md-8">
                    <h3>{{ $achievement->title }}</h3>
                    <p><strong>Kategori:</strong> {{ $achievement->category }}</p>
                    <p><strong>Tanggal:</strong> {{ $achievement->date->format('d M Y') }}</p>
                    <p><strong>Deskripsi:</strong></p>
                    <p>{!! nl2br(e($achievement->description)) !!}</p>
                </div>
            </div>  
        </div>
    </div>
@endsection     
