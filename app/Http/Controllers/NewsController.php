<?php

namespace App\Http\Controllers;


use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        $breadcrumbs=[
            'Konten' => '#',
            'Berita' => route('admin.news.index'),
        ];
        return view('admin.news.index', compact('news', 'breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs=[
            'Konten' => '#',
            'Berita' => route('admin.news.index'),
            'Tambah Berita' => route('admin.news.create'),
        ];
        return view('admin.news.create',compact('breadcrumbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|max:2048',
            'content' => 'required',
            'published_at' => 'nullable|date',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }
        $slug = Str::slug($request->title, '-');
        // Pastikan slug unik
        $count = News::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }
       

        News::create([
            'title' => $request->title,
            'slug' => $slug,
            'image' => $imagePath,
            'content' => $request->content,
            'published_at' => $request->published_at,
        ]);
        Artisan::call('app:generate-sitemap');
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image'=> 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            // Hapus file gambar lama jika ada
            if ($news->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($news->image);
            }
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
        }
        $news->title = $request->title;
        $news->content = $request->content;
        $news->published_at = $request->published_at;
        $news->save();
        Artisan::call('app:generate-sitemap');
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(News $news)
    {
        // Hapus file gambar dari storage
        if ($news->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($news->image);
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.show', compact('news'));
    }
}
