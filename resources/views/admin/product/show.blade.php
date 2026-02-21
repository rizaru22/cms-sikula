@extends('layouts.app')
@section('title', 'Produk')
@section('page_title', 'Detail Produk')
@section('styles')
<style>
    .card-body img {
        max-width: 100%;
        height: auto;
    }
    .remove-image {
        position: absolute;     
        top: 5px;
        right: 5px;
        background: rgba(0,0,0,.6);
        color: white;
        border: none;
        border-radius: 50%;
        width: 26px;
        height: 26px;
        font-size: 14px;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
    <div class="card ml-2 mr-2">
        <div class="card-header">
            <h3 class="card-title">Detail Produk</h3>
             <div class="card-tools">
                <a href="{{ route('admin.product.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button> 
                </form>
            </div> 
        </div>          
        <div class="card-body">
            <h4>{{ $product->name }}</h4>
            <p>{!! $product->description !!}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p><strong>Stok:</strong> {{ $product->stock }} {{ $product->unit }}</p>
            <p><strong>Nara Hubung:</strong> {{ $product->contact_person }}</p>
            
            <div class="row">
                
                @foreach ($product->gallery?? [] as $image)
                    <div class="col-md-3 mb-3">
                        <img src="{{ asset('storage/' . $image) }}" alt="Gambar Produk" class="img-fluid rounded">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection 