@extends('layouts.app')
@section('title', 'Kompetensi Keahlian')
@section('page_title', 'Tampil Kompetensi Keahlian')
@section('content')
    <div class="card ml-2 mr-2">
        <div class="card-header">
            <h3 class="card-title">{{$kompetensi->name}}</h3>
            
            <div class="card-tools">
                <a href="{{ route('admin.kompetensi.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                <a href="{{ route('admin.kompetensi.edit', $kompetensi->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                <form action="{{ route('admin.kompetensi.destroy', $kompetensi->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus kompetensi keahlian ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button> 
                </form>
            
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if ($kompetensi->logo)
                        <img src="{{ asset($kompetensi->logo) }}" alt="{{ $kompetensi->name }}"
                            class="img-fluid mb-3">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" alt="No Image" class="img-fluid mb-3">
                    @endif
                </div>
                <div class="col-md-8">
                    <h3>{{ $kompetensi->name }}</h3>
                    <p><strong>Deskripsi:</strong></p>
                    <p>{!!($kompetensi->description) !!}</p>
                </div>
            </div>  
        </div>
    </div>
@endsection     
