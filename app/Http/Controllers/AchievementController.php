<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Artisan;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::all()->sortByDesc('date');
        $breadcrumbs=[
            'Konten' => '#',
            'Prestasi' => route('admin.achievement.index'),
        ];
        return view('admin.achievement.index', compact('achievements','breadcrumbs'));
    }

    public function create()
    {
         $breadcrumbs=[
            'Konten' => '#',
            'Prestasi' => route('admin.achievement.index'),
            'Tambah Prestasi' => route('admin.achievement.create'),
        ];
        $category_achievements = \App\Models\CategoryAchievement::all();
        return view('admin.achievement.create', compact('breadcrumbs','category_achievements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_achievement_id' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'image' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('achievement', 'public');
        }
        $slug = Str::slug($request->title, '-');
        // Pastikan slug unik
        $count = Achievement::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }
// dd($request->category_achievement_id);
        Achievement::create([
            'title' => $request->title,
            'slug' => $slug,
            'category_achievement_id' => $request->category_achievement_id,
            'description' => $request->description,
            'date' => $request->date,
            'image' => $imagePath,
        ]);
        //Artisan::call('app:generate-sitemap');
        return redirect()->route('admin.achievement.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function edit(Achievement $achievement)
    {
         $breadcrumbs=[
            'Konten' => '#',
            'Berita' => route('admin.news.index'),
            'Edit Berita' => route('admin.news.edit',$achievement->id),
        ];
        $category_achievements = \App\Models\CategoryAchievement::all();

        return view('admin.achievement.edit', compact('achievement','breadcrumbs','category_achievements'));
    }

    public function update(Request $request, Achievement $achievement)
    {
         $request->validate([
            'title' => 'required',
            'category_achievement_id' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'image' => 'image|max:2048',
        ],[
            'category_achievement_id.required' => 'Kategori prestasi harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'date.date' => 'Format tanggal tidak valid',
            'date.required' => 'Tanggal harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'title.required' => 'Judul harus diisi',
        ]);

         if ($request->hasFile('image')) {
            // Hapus file gambar lama jika ada
            if ($achievement->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($achievement->image);
            }
            $imagePath = $request->file('image')->store('achievement', 'public');
            $achievement->image = $imagePath;
        }
        $achievement->title=$request->title;
        $achievement->category_achievement_id=$request->category_achievement_id;
        $achievement->description=$request->description;
        $achievement->date=$request->date;
        $achievement->save();
        //Artisan::call('app:generate-sitemap');
        return redirect()->route('admin.achievement.index')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function destroy(Achievement $achievement)
    {
        if ($achievement->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($achievement->image);
            }
        $achievement->delete();
        return redirect()->route('admin.achievement.index')->with('success', 'Prestasi berhasil dihapus');
    }

    public function show(Achievement $achievement)
    {
        $breadcrumbs=[
            'Konten' => '#',
            'Prestasi' => route('admin.achievement.index'),
            'Tampil Prestasi' => route('admin.achievement.show',$achievement->id),
        ];
        return view('admin.achievement.show', compact('achievement','breadcrumbs'));
    }
}
