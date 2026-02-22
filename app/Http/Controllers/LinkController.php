<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    //
    public function index()
    {
        $links = \App\Models\Link::all();
        return view('admin.link.index', compact('links'));
    }
    
    public function toggle($id)
    {
        $link = \App\Models\Link::findOrFail($id);
        $link->is_active = !$link->is_active;
        $link->save();
        
        return redirect()->back()->with('success', 'Status link berhasil diubah.');
    }

    public function create()
    {
        return view('admin.link.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        \App\Models\Link::create($request->only('name', 'url'));

        return redirect()->route('admin.link.index')->with('success', 'Link berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $link = \App\Models\Link::findOrFail($id);
        return view('admin.link.edit', compact('link'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'is_active' => 'required|boolean',
        ]);

        $link = \App\Models\Link::findOrFail($id);
        $link->update($request->only('name', 'url', 'is_active'));

        return redirect()->route('admin.link.index')->with('success', 'Link berhasil diperbarui.');
    }
}