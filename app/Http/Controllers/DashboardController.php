<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\KompetensiKeahlian;
use App\Models\Link;
use App\Models\Pengumuman;
use App\Models\Ppdb;
use App\Models\Achievement as Prestasi;
use App\Models\Produk;
use App\Models\User;

class DashboardController extends Controller
{


public function index()
{
    $data = [
        'totalBerita'      => News::count(),
        'totalPrestasi'    => Prestasi::count(),
        'totalKompetensi'  => KompetensiKeahlian::count(),
        'totalPengumuman'  => Pengumuman::count(),
        'totalProduk'      => Produk::count(),
        'totalLink'        => Link::count(),
        'totalUser'        => User::count(),

        'ppdbPublished'    => Ppdb::where('status', 'published') -> where('is_active', true)->count(),
        'ppdbDraft'        => Ppdb::where('status', 'draft')->count(),

        'latestBerita'     => News::latest()->take(5)->get(),
        'latestPengumuman' => Pengumuman::latest()->take(5)->get()
        ,
    ];

    return view('admin.dashboard', $data);
}
}
