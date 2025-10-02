<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryAchievement;

class CategoryAchievementController extends Controller
{
    //
    public function index()
    {
        $achievement_categories = \App\Models\CategoryAchievement::all();
        $breadcrumbs=[
            'Konten' => '#',
            'Kategori Prestasi' => route('admin.category-achievement.index'),
        ];

        return view('admin.category_achievement.index', compact('achievement_categories','breadcrumbs'));
    }

    public function create()
    {
          $breadcrumbs=[
            'Konten' => '#',
            'Kategori Prestasi' => route('admin.category-achievement.index'),
        ];

        return view('admin.category_achievement.create',compact('breadcrumbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:category_achievements,name',
        ],[
            'name.required' => 'Kategori prestasi harus diisi',
            'name.unique' => 'Kategori prestasi sudah ada ganti dengan yang lain',
        ]);

        $category_achievement = new \App\Models\CategoryAchievement();
        $category_achievement->name = $request->name;
        $category_achievement->save();
        return redirect()->route('admin.category-achievement.index')->with('success', 'Kategori prestasi berhasil ditambahkan');
    }

    public function edit(CategoryAchievement $category_achievement)
    {
        $breadcrumbs=[
            'Konten' => '#',
            'Kategori Prestasi' => route('admin.category-achievement.index'),
        ];
        return view('admin.category_achievement.edit',compact('breadcrumbs','category_achievement'));
    }

    public function update(Request $request,CategoryAchievement $category_achievement)
    {
        $request->validate([
            'name' => 'required|unique:category_achievements,name',
        ],[
            'name.required' => 'Kategori prestasi harus diisi',
            'name.unique' => 'Kategori prestasi sudah ada ganti dengan yang lain',
        ]);

        $category_achievement->name = $request->name;
        $category_achievement->save();
        return redirect()->route('admin.category-achievement.index')->with('success', 'Kategori prestasi berhasil diubah');
    }

    public function destroy(CategoryAchievement $category_achievement)
    {
        $category_achievement->delete();
        return redirect()->route('admin.category-achievement.index')->with('success', 'Kategori prestasi berhasil dihapus');
    }
}
