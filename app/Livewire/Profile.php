<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Profile extends Component
{
   public function render()
{
    return view('livewire.profile')
        ->layout('layouts.landing', [
            'title' => 'Profil Sekolah',
            'description' => Str::limit(
                strip_tags(
                    $this->profile->welcome_message ?? 
                    'Profil SMK Negeri 1 Darul Aman'
                ),
                150,
                '...'
            ),
            'image' => $this->profile->logo ?? asset('images/logo-default.png'),
        ]);
}
}
