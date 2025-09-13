@extends('layouts.app')
@section('title', 'Berita')
@section('page_title', 'Detail Berita')
@section('content')
    <div class="card ml-3 mr-3">
        <div class="card-header">
            <h3 class="card-title">{{ $news->title }}</h3>
            <div class="card-tools">
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button> 
                </form>
            </div> 
        </div>
        <div class="card-body">
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="Gambar Berita" class="img-fluid mb-3">
            @endif
            <div>{!! $news->content !!}</div>
            <p class="text-muted mt-3">Diterbitkan pada: {{ $news->published_at ? $news->published_at->format('d M Y') : 'Draft' }}</p>
        </div>
        </div>
    

@endsection