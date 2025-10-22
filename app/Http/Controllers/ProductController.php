<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Str;
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

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'=>'required|string|max:20',
            'contact_person'=>'required|string|max:100',
            'description'=>'nullable|string',
            'unit'=>'required|string|max:100',
            'gallery'=>'nullable|array',
            'gallery.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'name.required'=>'Nama produk wajib diisi.',
            'price.required'=>'Harga produk wajib diisi.',
            'contact_person.required'=>'Kontak produk wajib diisi.',
            'unit.required'=>'Satuan produk wajib diisi.',
            'image.image'=>'File gambar harus berupa gambar.',
            'image.mimes'=>'Format gambar harus jpeg, png, jpg, gif, atau svg.',
            'image.max'=>'Ukuran gambar maksimal 2MB.',
            'gallery.*.image'=>'File gallery harus berupa gambar.',
            'gallery.*.mimes'=>'Format gallery harus jpeg, png, jpg, gif, atau svg.',
            'gallery.*.max'=>'Ukuran gallery maksimal 2MB per file.',
        ]);
        $product = new \App\Models\Produk();
        $product->name = $request->name;
        $slug = Str::slug($request->name, '-');
        // Pastikan slug unik
        $count = Produk::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }
        $product->slug = $slug;
        // bersihkan format harga dari Rp dan titik
        $cleanedPrice = str_replace(['Rp', '.', ','], '', $request->price);
        $product->price = $cleanedPrice;
        $product->contact_person = $request->contact_person;
        $product->description = $request->description;
        $product->unit = $request->unit;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('products','public');
            $product->image = $imagePath;
        }
        if($request->hasFile('gallery')){
            $galleryPaths = [];
            foreach($request->file('gallery') as $galleryImage){
                $path = $galleryImage->store('product_galleries','public');
                $galleryPaths[] = $path;
            }
            $product->gallery = json_encode($galleryPaths);
        }
        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan.');
    }
}
