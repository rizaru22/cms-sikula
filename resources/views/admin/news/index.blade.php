@extends('layouts.app')
@section('title','Berita')
@section('page_title', 'Daftar Berita')
@section('content')
<div class="card ml-2 mr-2">
    <div class="card-header">
        <div class="text-right">
        <a href="{{ route('admin.news.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Berita</a>
        </div>
    </div>
    <div class="card-body">
        <x-datatable :columns="['No','Judul', 'Tanggal Terbit', 'Aksi']" id="newsTable">
            @foreach($news as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{route('admin.news.show',$item->id)}}">{{ $item->title }}</a></td>
                    <td>{{ $item->published_at->format('d M Y') }}</td>
                    <td>
                    <div class="btn-group">                 
                         <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-flat" onclick="return confirm('Yakin ingin menghapus berita ini?')"><i class="fas fa-trash"></i></button>
                        </form>
                     </div>
                     
                    </td>
                </tr>
            @endforeach
        </x-datatable>
    </div>
@endsection

