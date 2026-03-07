@extends('layouts.app')
@section('title', 'Menu')
@section('page_title', 'Daftar Menu')
@section('content')
    <div class="card ml-2 mr-2">
        <div class="card-header">
            <div class="text-right  ">
                <a href="{{ route('admin.menu.create') }}" class="btn btn-primary"><i
                        class="fas fa-plus"></i>&nbsp;Menu</a>
            </div>
        </div>
        <div class="card-body">
            <x-datatable :columns="['No', 'Nama Menu', 'Route', 'Aktif/Non Aktif', 'Aksi']" id="achievementsTable"> 
                
                @foreach ($menus as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->route }}</td>
                        <td>
                            <form action="{{ route('admin.menu.toggle', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH') 
                                <button type="submit" class="btn btn-sm btn-flat {{ $item->is_active ? 'btn-success' : 'btn-secondary' }}"><i class="fas fa-toggle-{{ $item->is_active ? 'on' : 'off' }}"></i>&nbsp;
                                    {{ $item->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.menu.edit', $item->id) }}"
                                    class="btn btn-sm btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                <form action="{{ route('admin.menu.destroy', $item->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-flat"
                                        onclick="return confirm('Yakin ingin menghapus menu ini?')"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-datatable>
        </div>
    </div>
@endsection