<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    //
    public function index()
    {
        $breadcrumbs=[
            'Pengaturan' => '#',
            'Carousel' => route('admin.carousel.index'),
        ];
        $carousels = \App\Models\Carousel::paginate(5);
        return view('admin.carousel.index', compact('carousels','breadcrumbs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);
        
        $carousel = Carousel::findOrFail($id);
        $carousel->status = $request->status;
        $carousel->save();

        return response()->json(['success' => true]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'image.required' => 'Foto carousel wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format foto harus jpeg, png, jpg, gif, atau svg.',
            'image.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $fotoPath = $request->file('image')->store('carousels', 'public');
        }

        $carousel = new \App\Models\Carousel();
        $carousel->image= $fotoPath;
        $carousel->status = 'active';
        // dd($carousel);
        $carousel->save();

        return redirect()->route('admin.carousel.index')->with('success', 'Carousel berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);
        // Hapus file gambar dari storage
        if ($carousel->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($carousel->image);
        }
        $carousel->delete();

        return redirect()->route('admin.carousel.index')->with('success', 'Carousel berhasil dihapus.');
    }
}
