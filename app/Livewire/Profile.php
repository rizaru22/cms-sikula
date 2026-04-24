<?php

namespace App\Livewire;

use App\Models\Profile as SchoolProfile;
use Livewire\Component;
use Illuminate\Support\Str;

class Profile extends Component{
    
    public function render(){
        $profile = SchoolProfile::first();
        $berita_terbaru=\App\Models\News::orderBy('published_at', 'desc')->take(3)->get();
        $prestasi_terbaru=\App\Models\Achievement::orderBy('date', 'desc')->take(3)->get();
        $kompetensi_keahlians=\App\Models\KompetensiKeahlian::all();
        return view('livewire.profile',compact('kompetensi_keahlians', 'berita_terbaru','prestasi_terbaru', 'profile'))
                    ->layout('layouts.landing', [
                        'title' => 'Profil Sekolah',
                        'description' => Str::limit(
                        strip_tags(
                            $profile?->welcome_message ??
                                    'Profil SMK Negeri 1 Nasional'
                        ),
                        150,
                        '...'
                ),
                'image' => $profile?->logo ?? asset('images/no-image.png'),
        ]);
}
}
