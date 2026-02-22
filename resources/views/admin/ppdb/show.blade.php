@extends('layouts.app')
@section('title', 'PPDB')
@section('page_title', 'Detail PPDB')
@section('content')
    <div class="card ml-3 mr-3">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">{{ $ppdb->title }}</h3>
            <div class="card-tools">
                <a href="{{ route('admin.ppdb.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                <a href="{{ route('admin.ppdb.edit', $ppdb->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                <form action="{{ route('admin.ppdb.destroy', $ppdb->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus PPDB ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button> 
                </form>
            </div> 
        </div>
        <div class="card-body">
            <div class="font-weight-bold mb-3">

            <table>
                <tr>
                    <td><strong>Tahun Ajaran</strong></td>
                    <td>:</td>
                    <td>{{ $ppdb->tahun_ajaran }}</td>
                </tr>
                <tr>
                    <td><strong>Aktif</strong></td>
                    <td>:</td>
                    <td>{!! $ppdb->is_active ? '<span class="badge badge-success">Ya</span>' : '<span class="badge badge-danger">Tidak</span>' !!}</td>
                </tr>
                <tr>
                    <td><strong>Status</strong></td>
                    <td>:</td>
                    <td>{!! $ppdb->status ? '<span class="badge badge-success">Published</span>' : '<span class="badge badge-secondary">Draft</span>' !!}</td>
                </tr>
            
            </table>
            </div>
            <hr>
            <div>{!! $ppdb->content !!}</div>
            
        </div>
        </div>
    

@endsection