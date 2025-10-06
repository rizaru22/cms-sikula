@extends('layouts.app')
@section('title','Produk')
@section('page_title', 'Daftar Produk')
@section('content')
<div class="card ml-2 mr-2">
    <div class="card-header">
        <div class="text-right">
        <a href="{{ route('admin.product.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Produk</a>
        </div>
    </div>
    <div class="card-body">
        <x-datatable :columns="['No','Nama', 'Harga','Nara Hubung', 'Aksi']" id="productsTable">
            @foreach($products as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{route('admin.product.show',$item->id)}}">{{ $item->name }}</a></td>
                    <td>{{ $item->price}}</td>
                    <td>{{ $item->contact_person}}</td>
                    <td>
                    <div class="btn-group">                 
                         <a href="{{ route('admin.product.show', $item->id) }}" class="btn btn-sm btn-success btn-flat"><i class="fas fa-eye"></i></a>
                         <a href="{{ route('admin.product.edit', $item->id) }}" class="btn btn-sm btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('admin.product.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-flat" onclick="return confirm('Yakin ingin menghapus produk ini?')"><i class="fas fa-trash"></i></button>
                        </form>
                     </div>
                     
                    </td>
                </tr>
            @endforeach
        </x-datatable>
    </div>
@endsection

