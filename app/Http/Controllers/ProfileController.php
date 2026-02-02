<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $breadcrumbs=[
            'Pengaturan' => '#',
            'Profil' => route('admin.profile.index'),
        ];
        return view('admin.profile.index', compact('profile','breadcrumbs'));
    }

    public function edit()
    {
        $breadcrumbs=[
            'Pengaturan' => '#',
            'Profil' => '',
        ];
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile','breadcrumbs'));
    }

    public function update(Request $request)
    {
        // Storage::disk('public')->put('test.txt', 'halo dunia');
        // dd('tes');
        $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:100',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'welcome_message' => 'nullable|string',
            'history' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'study_programs' => 'nullable|array',
            'study_programs.*' => 'string|max:100',
        ],[
            'name.required' => 'Nama sekolah wajib diisi.',
            'short_name.required' => 'Nama singkat sekolah wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'logo.image' => 'File logo harus berupa gambar.',
            'logo.mimes' => 'Format logo harus jpeg, png, jpg, gif, atau svg.',
            'logo.max' => 'Ukuran logo maksimal 2MB.',
        ]);

        // dd('ok');
        if ($request->hasFile('logo')) {
            // dd($request->file('logo'));
            $logoPath = $request->file('logo')->store('logos','public');
        }

        $profile = Profile::first();
        $profile->name=$request->name;
        $profile->short_name=$request->short_name;
        $profile->email=$request->email;
        $profile->phone=$request->phone;
        $profile->address=$request->address;
        if ($request->hasFile('logo')) {
            if (!empty($profile->logo) && Storage::disk('public')->exists($profile->logo)) {
                Storage::disk('public')->delete($profile->logo);
            }
            
            $profile->logo=$logoPath;
            
        }
        
        $profile->welcome_message=$request->welcome_message;
        $profile->history=$request->history;
        $profile->vision=$request->vision;
        $profile->mission=$request->mission;
        $profile->facebook=$request->facebook;
        $profile->instagram=$request->instagram;
        $profile->twitter=$request->twitter;
        $profile->youtube=$request->youtube;
        $profile->thread=$request->thread;

        $profile->save();
        
        if ($request->hasFile('logo')) {
    try {
        $this->generateFavicon($profile->logo,32);
    } catch (\Throwable $e) {
        Log::error($e->getMessage());
    }
}

        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diperbarui');
    }



protected function generateFavicon(string $logoPath, int $size = 32): void
{
    try {
        $disk = Storage::disk('public'); // tambahkan ini
        // pastikan file ada
        if (!Storage::disk('public')->exists($logoPath)) {
            Log::warning("Favicon skipped: file not found ({$logoPath})");
            return;
        }

         // ambil full path real (symlink-safe)
        $fullPath = $disk->path($logoPath);

        // validasi mime (shared hosting friendly)
        $mime = mime_content_type($fullPath);
        if (!str_starts_with($mime, 'image/')) {
            Log::warning("Favicon skipped: not an image ({$mime})");
            return;
        }

        // pakai GD secara eksplisit
        $manager = new ImageManager(new Driver());

        $image = $manager->read($fullPath)
            ->resize($size, $size, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

       // pastikan folder tujuan ada
        $folder = dirname($logoPath);
        if (!$disk->exists($folder)) {
            $disk->makeDirectory($folder);
        }

        // simpan favicon di folder yang sama
        $faviconPath = $folder.'/favicon.png';
        $image->save($disk->path($faviconPath));

    } catch (\Throwable $e) {
        // JANGAN pernah lempar ulang error di sini
        Log::error('generateFavicon failed: '.$e->getMessage());
    }
}
}
