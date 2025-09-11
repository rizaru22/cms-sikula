<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $profile = Profile::first();
        $profile->name=$request->name;
        $profile->short_name=$request->short_name;
        $profile->email=$request->email;
        $profile->phone=$request->phone;
        $profile->address=$request->address;
        if ($request->hasFile('logo')) {
            if ($profile->logo && Storage::disk('public')->exists($profile->logo)) {
                Storage::disk('public')->delete($profile->logo);
            }
            
            $profile->logo=$logoPath;

        }
        // dd($request);
        $profile->welcome_message=$request->welcome_message;
        $profile->history=$request->history;
        $profile->vision=$request->vision;
        $profile->mission=$request->mission;

        $profile->save();

        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diperbarui');
    }
}
