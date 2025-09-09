<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('admin.profile.index', compact('profile'));
    }

    public function edit()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::first();
        $profile->update($request->only(['welcome_message','history','vision','mission','study_programs']));
        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diperbarui');
    }
}
