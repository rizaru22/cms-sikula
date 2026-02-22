@extends('layouts.app')
@section('title','PPDB')
@section('page_title', 'Daftar PPDB')
@section('content')
<div class="card ml-2 mr-2">
    <div class="card-header">
        <div class="text-right">
        <a href="{{ route('admin.ppdb.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;PPDB</a>
        </div>
    </div>
    <div class="card-body">
        <x-datatable :columns="['No','Tahun Ajaran', 'Aktif','Status', 'Aksi']" id="ppdbTable">
            @foreach($ppdbs as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{route('admin.ppdb.show',$item->id)}}">{{ $item->tahun_ajaran }}</a></td>
                    <td>
                        <form action="{{ route('admin.ppdb.toggleActive', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm {{ $item->is_active ? 'btn-success' : 'btn-danger' }} btn-flat">
                                {{ $item->is_active ? 'Aktif' : 'Jadikan Aktif' }}
                            </button>
                        </form>
                    </td>
                    <td>  <form action="{{ route('admin.ppdb.toggleStatus', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm {{ $item->status === 'published' ? 'btn-success' : 'btn-secondary' }} btn-flat">
                                {{ $item->status === 'published' ? 'Published' : 'Draft' }}
                            </button>
                        </form>
                      
                    </td>
                    <td>
                    <div class="btn-group">                 
                         <a href="{{ route('admin.ppdb.edit', $item->id) }}" class="btn btn-sm btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('admin.ppdb.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-flat" onclick="return confirm('Yakin ingin menghapus PPDB ini?')"><i class="fas fa-trash"></i></button>
                        </form>
                     </div>
                     
                    </td>
                </tr>
            @endforeach
        </x-datatable>
    </div>
@endsection

