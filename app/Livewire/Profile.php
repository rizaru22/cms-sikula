<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Profile extends Component
{
   public function render(){
    $kompetensi_keahlians=\App\Models\KompetensiKeahlian::all();
    return view('livewire.profile',compact('kompetensi_keahlians'))
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
