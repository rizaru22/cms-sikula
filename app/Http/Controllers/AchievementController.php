<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::latest()->paginate(10);
        return view('admin.achievement.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|string',
        ]);
        Achievement::create($request->all());
        Artisan::call('app:generate-sitemap');
        return redirect()->route('admin.achievement.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievement.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|string',
        ]);
        $achievement->update($request->all());
        return redirect()->route('admin.achievement.index')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        return redirect()->route('admin.achievement.index')->with('success', 'Prestasi berhasil dihapus');
    }
}
