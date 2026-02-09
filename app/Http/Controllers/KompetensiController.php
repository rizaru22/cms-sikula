<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class KompetensiController extends Controller
{
    //
    public function index()
    {
        $kompetensi = \App\Models\KompetensiKeahlian::all();
        $breadcrumbs=[
            'Konten' => '#',
            'Kompetensi Keahlian' => route('admin.kompetensi.index'),
        ];
        return view('admin.kompetensi.index', compact('kompetensi', 'breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs=[
            'Konten' => '#',
            'Kompetensi Keahlian' => route('admin.kompetensi.index'),
            'Tambah Kompetensi Keahlian' => route('admin.kompetensi.create'),
        ];
        return view('admin.kompetensi.create', compact( 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        $kompetensi = new \App\Models\KompetensiKeahlian();
        $kompetensi->name = $request->input('name');
        $kompetensi->slug = \Str::slug($request->input('name'));
        $kompetensi->description = $request->input('description');

        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('kompetensi', 'public');
            $kompetensi->logo = $imagePath;
        }

        $kompetensi->save();
        Artisan::call('app:generate-sitemap');
        return redirect()->route('admin.kompetensi.index')->with('success', 'Kompetensi Keahlian berhasil ditambahkan.');
    }   

    public function show($id)
    {
        $kompetensi = \App\Models\KompetensiKeahlian::findOrFail($id);
        $breadcrumbs=[
            'Konten' => '#',
            'Kompetensi Keahlian' => route('admin.kompetensi.index'),
            'Tampil Kompetensi Keahlian' => route('admin.kompetensi.show', $id),
        ];
        return view('admin.kompetensi.show', compact('kompetensi', 'breadcrumbs'));
    }   

    public function edit($id)
    {
        $kompetensi = \App\Models\KompetensiKeahlian::findOrFail($id);
        $breadcrumbs=[
            'Konten' => '#',
            'Kompetensi Keahlian' => route('admin.kompetensi.index'),
            'Edit Kompetensi Keahlian' => route('admin.kompetensi.edit', $id),
        ];
        return view('admin.kompetensi.edit', compact('kompetensi', 'breadcrumbs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
        ]);

        $kompetensi = \App\Models\KompetensiKeahlian::findOrFail($id);
        $kompetensi->name = $request->input('name');
        $kompetensi->slug = \Str::slug($request->input('name'));
        $kompetensi->description = $request->input('description');

        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('kompetensi', 'public');
            $kompetensi->logo = $imagePath;
        }

        $kompetensi->save();
        Artisan::call('app:generate-sitemap');
        return redirect()->route('admin.kompetensi.index')->with('success', 'Kompetensi Keahlian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kompetensi = \App\Models\KompetensiKeahlian::findOrFail($id);
        $kompetensi->delete();
        Artisan::call('app:generate-sitemap');
        return redirect()->route('admin.kompetensi.index')->with('success', 'Kompetensi Keahlian berhasil dihapus.');
    }
}
