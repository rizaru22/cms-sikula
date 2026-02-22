<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ppdbController extends Controller
{
    //
    public function index()
    {
        $ppdbs = \App\Models\Ppdb::all();
        return view('admin.ppdb.index', compact('ppdbs'));
    }

    public function create()
    {
        return view('admin.ppdb.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_active' => 'nullable|boolean',
            'status' => 'required|string|in:draft,published',
        ]);

        $slug = Str::slug($request->title, '-');
        // Pastikan slug unik
        $count = \App\Models\Ppdb::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $ppdb = new \App\Models\Ppdb();
        $ppdb->tahun_ajaran = $request->tahun_ajaran;
        $ppdb->title = $request->title;
        $ppdb->slug = $slug;
        $ppdb->content = $request->content;
        $ppdb->is_active = $request->has('is_active') ? 1 : 0;
        $ppdb->status = $request->status;
        $ppdb->save();

        return redirect()->route('admin.ppdb.index')->with('success', 'PPDB berhasil dibuat.');
    }

    public function edit($id)
    {
        $ppdb = \App\Models\Ppdb::findOrFail($id);
        return view('admin.ppdb.edit', compact('ppdb'));
    }

    public function update(Request $request, $id)
    {
        $ppdb = \App\Models\Ppdb::findOrFail($id);

        $request->validate([
            'tahun_ajaran' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_active' => 'nullable|boolean',
            'status' => 'required|string|in:draft,published',
        ]);

        $slug = Str::slug($request->title, '-');
        // Pastikan slug unik
        $count = \App\Models\Ppdb::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $id)->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $ppdb->tahun_ajaran = $request->tahun_ajaran;
        $ppdb->title = $request->title;
        $ppdb->slug = $slug;
        $ppdb->content = $request->content;
        $ppdb->is_active = $request->has('is_active') ? 1 : 0;
        $ppdb->status = $request->status;
        $ppdb->save();

        return redirect()->route('admin.ppdb.index')->with('success', 'PPDB berhasil diperbarui.');
    }   

    public function destroy($id)
    {
        $ppdb = \App\Models\Ppdb::findOrFail($id);
        $ppdb->delete();

        return redirect()->route('admin.ppdb.index')->with('success', 'PPDB berhasil dihapus.');
    }

    public function show($id)
    {
        $ppdb = \App\Models\Ppdb::findOrFail($id);
        return view('admin.ppdb.show', compact('ppdb'));
    }

    public function toggleStatus($id)
    {
        $ppdb = \App\Models\Ppdb::findOrFail($id);
        $ppdb->status = $ppdb->status === 'published' ? 'draft' : 'published';
        $ppdb->save();

        return redirect()->route('admin.ppdb.index')->with('success', 'Status PPDB berhasil diubah.');
    }

   public function activate($id)
{
    $ppdb = \App\Models\Ppdb::findOrFail($id);

    if ($ppdb->status !== 'published') {
        return back()->with('error', 'Hanya PPDB publish yang bisa diaktifkan.');
    }

    $ppdb->is_active = true;
    $ppdb->save(); // model event akan nonaktifkan lainnya

    return redirect()->route('admin.ppdb.index')
        ->with('success', 'PPDB berhasil dijadikan aktif.');
}
}
