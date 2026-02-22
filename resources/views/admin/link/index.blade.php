@extends('layouts.app')
@section('title', 'Link')
@section('page_title', 'Daftar Link')
@section('content')
    <div class="card ml-2 mr-2">
        <div class="card-header">
            <div class="text-right">
                <a href="{{ route('admin.link.create') }}" class="btn btn-success"><i
                        class="fas fa-plus"></i>&nbsp;Link</a>
            </div>
        </div>
        <div class="card-body">
            <x-datatable :columns="['No', 'Nama', 'URL', 'Aktif/Non Aktif', 'Aksi']" id="achievementsTable">

                @foreach ($links as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->url }}</td>
                        <td>
                            <form action="{{ route('admin.link.toggle', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH') 
                                <button type="submit" class="btn btn-sm btn-flat {{ $item->is_active ? 'btn-success' : 'btn-secondary' }}"><i class="fas fa-toggle-{{ $item->is_active ? 'on' : 'off' }}"></i>&nbsp;
                                    {{ $item->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.link.edit', $item->id) }}"
                                    class="btn btn-sm btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                <form action="{{ route('admin.link.destroy', $item->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-flat"
                                        onclick="return confirm('Yakin ingin menghapus link ini?')"><i
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

