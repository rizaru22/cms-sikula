@extends('layouts.app')
@section('title', 'Pengumuman')
@section('page_title', 'Daftar Pengumuman')
@section('content')
    <div class="card ml-2 mr-2">
        <div class="card-header">
            <div class="text-right">
                <a href="{{ route('admin.announcement.create') }}" class="btn btn-success"><i
                        class="fas fa-plus"></i>&nbsp;Pengumuman</a>
            </div>
        </div>
        <div class="card-body">
            <x-datatable :columns="['No', 'Judul', 'Deskripsi', 'Tanggal Mulai', 'Tanggal Berakhir', 'Aksi']" id="achievementsTable">

                @foreach ($announcement as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ tglIndo($item->event_date) }}</td>
                        <td>{{ tglIndo($item->end_date) }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.announcement.edit', $item->id) }}"
                                    class="btn btn-sm btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                <form action="{{ route('admin.announcement.destroy', $item->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-flat"
                                        onclick="return confirm('Yakin ingin menghapus pengumuman ini?')"><i
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
