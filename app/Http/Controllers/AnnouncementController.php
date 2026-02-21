<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //
    public function index()
    {
        $announcement = \App\Models\Pengumuman::orderBy('created_at', 'desc')->get();
        return view('admin.announcement.index', compact('announcement'));
    }

    public function create()
    {
        return view('admin.announcement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'event_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:event_date',
        ]);

        \App\Models\Pengumuman::create($request->only('title', 'description', 'event_date', 'end_date'));

        return redirect()->route('admin.announcement.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $announcement = \App\Models\Pengumuman::findOrFail($id);
        return view('admin.announcement.edit', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'event_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:event_date',
        ]);

        $announcement = \App\Models\Pengumuman::findOrFail($id);
        $announcement->update($request->only('title', 'description', 'event_date', 'end_date'));

        return redirect()->route('admin.announcement.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $announcement = \App\Models\Pengumuman::findOrFail($id);
        $announcement->delete();

        return redirect()->route('admin.announcement.index')->with('success', 'Pengumuman berhasil dihapus.');
    }
}
