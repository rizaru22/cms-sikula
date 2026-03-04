@extends('layouts.app')
@section('title','Pengguna')
@section('page_title', 'Daftar Pengguna')
@section('content')
<div class="card ml-2 mr-2">
    <div class="card-header">
        <div class="text-right">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Pengguna</a>
        </div>
    </div>
    <div class="card-body">
        <x-datatable :columns="['No','Nama', 'Email', 'Aksi']" id="usersTable">
            @foreach($users as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td><a href="{{route('admin.users.show',$item->id)}}">{{ $item->name }}</a></td>
                    <td>{{ $item->email }}</td>
                    <td>
                    <div class="btn-group">                 
                         <a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-sm btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                         @if($item->id !== auth()->id() && $item->id !== 1)
                        <!-- tombol delete -->
                        <form action="{{ route('admin.users.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-flat" onclick="return confirm('Yakin ingin menghapus pengguna ini?')"><i class="fas fa-trash"></i></button>
                        </form>
                        @endif
                     </div>
                    </td>
                </tr>
            @endforeach
        </x-datatable>
    </div>
</div>
@endsection