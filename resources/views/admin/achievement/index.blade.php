@extends('layouts.app')
@section('title', 'Prestasi')
@section('page_title', 'Daftar Prestasi')
@section('content')
    <div class="card ml-2 mr-2">
        <div class="card-header">
            <div class="text-right">
                <a href="{{ route('admin.achievement.create') }}" class="btn btn-success"><i
                        class="fas fa-plus"></i>&nbsp;Prestasi</a>
            </div>
        </div>
        <div class="card-body">
            <x-datatable :columns="['No', 'Judul', 'Kategori', 'Tanggal', 'Aksi']" id="newsTable">

                @foreach ($achievements as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('admin.achievement.show', $item->id) }}">{{ $item->title }}</a></td>
                        <td>{{ $item->category_achievement->name }}</td>
                        <td>{{ tglIndo($item->date) }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.achievement.edit', $item->id) }}"
                                    class="btn btn-sm btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                <form action="{{ route('admin.achievement.destroy', $item->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-flat"
                                        onclick="return confirm('Yakin ingin menghapus berita ini?')"><i
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
