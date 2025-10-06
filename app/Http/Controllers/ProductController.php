<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = \App\Models\Produk::all()->sortByDesc('created_at');
        $breadcrumbs=[
            'Konten' => '#',
            'Produk' => route('admin.product.index'),
        ];
        return view('admin.product.index', compact('products','breadcrumbs'));

    }

    public function create()
    {
         $breadcrumbs=[
            'Konten' => '#',
            'Produk' => route('admin.product.index'),
            'Tambah Produk' => route('admin.product.create'),
        ];
        return view('admin.product.create', compact('breadcrumbs'));
    }
}
