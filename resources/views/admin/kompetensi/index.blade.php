@extends('layouts.app')
@section('title', 'Kompetensi Keahlian')
@section('page_title', 'Daftar Kompetensi Keahlian')
@section('content')
    <div class="card ml-2 mr-2">
        <div class="card-header">
            <div class="text-right">
                <a href="{{ route('admin.kompetensi.create') }}" class="btn btn-success"><i
                        class="fas fa-plus"></i>&nbsp;Kompetensi Keahlian</a>
            </div>
        </div>
        <div class="card-body">
            <x-datatable :columns="['No', 'Nama','Logo', 'Aksi']" id="kompetensiTable ">

                @foreach ($kompetensi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('admin.kompetensi.show', $item->id) }}">{{ $item->name }}</a></td>
                        <td><img src="{{ asset($item->logo) }}" alt="Logo" width="50"></td>
                       
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.kompetensi.edit', $item->id) }}"
                                    class="btn btn-sm btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                                <form action="{{ route('admin.kompetensi.destroy', $item->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-flat"
                                        onclick="return confirm('Yakin ingin menghapus kompetensi keahlian ini?')"><i
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
