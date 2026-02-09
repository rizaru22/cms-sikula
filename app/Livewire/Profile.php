<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Profile extends Component{
    
    public function render(){
        $berita_terbaru=\App\Models\News::latest()->take(3)->get();
        $prestasi_terbaru=\App\Models\Achievement::latest()->take(3)->get();
        $kompetensi_keahlians=\App\Models\KompetensiKeahlian::all();
        return view('livewire.profile',compact('kompetensi_keahlians', 'berita_terbaru','prestasi_terbaru'))
                    ->layout('layouts.landing', [
                        'title' => 'Profil Sekolah',
                        'description' => Str::limit(
                        strip_tags(
                            $this->profile->welcome_message ?? 
                                    'Profil SMK Negeri 1 Nasional'
                        ),
                        150,
                        '...'
                ),
                'image' => $this->profile->logo ?? asset('images/logo-default.png'),
        ]);
}
}
