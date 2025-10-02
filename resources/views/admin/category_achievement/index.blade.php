@extends('layouts.app')
@section('title', 'Kategori Prestasi')
@section('page_title', 'Kategori Prestasi')
@section('content')
    <div class="card ml-2 mr-2">
    <div class="card-header">
        <div class="text-right">
        <a href="{{ route('admin.category-achievement.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Kategori Prestasi</a>
        </div>
    </div>
    <div class="card-body">
        <x-datatable :columns="['No','Nama Kategori', 'Aksi']" id="KategoriTable">
            @foreach($achievement_categories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</a></td>
                    <td>
                        <div class="btn-group">
                                       <a href="{{ route('admin.category-achievement.edit', $item->id) }}" class="btn btn-sm btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('admin.category-achievement.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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
</div>
@endsection