@extends('layouts.app')

@section('title','Dashboard')
@section('page_title','Dashboard')

@section('content')

<div class="row ml-3 mr-3">

    @php
    $cards = [
        ['title'=>'Berita','total'=>$totalBerita,'icon'=>'fas fa-newspaper','color'=>'bg-info'],
        ['title'=>'Prestasi','total'=>$totalPrestasi,'icon'=>'fas fa-trophy','color'=>'bg-success'],
        ['title'=>'Kompetensi','total'=>$totalKompetensi,'icon'=>'fas fa-school','color'=>'bg-warning'],
        ['title'=>'Pengumuman','total'=>$totalPengumuman,'icon'=>'fas fa-bullhorn','color'=>'bg-danger'],
        ['title'=>'Produk','total'=>$totalProduk,'icon'=>'fas fa-box','color'=>'bg-primary'],
        ['title'=>'Link','total'=>$totalLink,'icon'=>'fas fa-link','color'=>'bg-secondary'],
    ];
@endphp


    @foreach($cards as $card)
    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
        <div class="small-box {{ $card['color'] }}">
            <div class="inner">
                <h3>{{ $card['total'] }}</h3>
                <p>{{ $card['title'] }}</p>
            </div>
            <div class="icon">
                <i class="{{ $card['icon'] }}"></i>
            </div>
        </div>
    </div>
    @endforeach


</div>


<div class="row ml-3 mr-3">

    <div class="col-md-6">
        <div class="card shadow-sm">
             <div class="card-header bg-primary text-white">
                <h3 class="card-title">Status PPDB</h3>
            </div>
            <div class="card-body">
                <p><strong>Published:</strong> {{ $ppdbPublished }}</p>
                <p><strong>Draft:</strong> {{ $ppdbDraft }}</p>

                @if($ppdbPublished > 0)
                    <span class="badge badge-success">PPDB Sedang Aktif</span>
                @else
                    <span class="badge badge-danger">PPDB Tidak Aktif</span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h3 class="card-title">Berita Terbaru</h3>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @forelse($latestBerita as $berita)
                        <li class="list-group-item">
                            {{ $berita->title }}
                            <small class="text-muted float-right">
                                {{ $berita->created_at->diffForHumans() }}
                            </small>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">
                            Belum ada berita
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

</div>


<div class="row ml-3 mr-3">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h3 class="card-title">
                    Selamat Datang, {{ auth()->user()->name }}
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Ini adalah dashboard utama CMS Sikula.
                    Gunakan menu di sebelah kiri untuk mengelola konten website sekolah.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h3 class="card-title">Informasi Sistem</h3>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li><strong>Environment:</strong> {{ app()->environment() }}</li>
                    <li><strong>PHP Version:</strong> {{ phpversion() }}</li>
                    <li><strong>Laravel Version:</strong> {{ app()->version() }}</li>
                    <li><strong>CMS Version:</strong> {{ config('app.version') }}</li>
                </ul>
            </div>
        </div>
    </div>

</div>

@endsection