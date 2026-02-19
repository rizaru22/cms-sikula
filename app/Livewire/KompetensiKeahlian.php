<?php

namespace App\Livewire;

use Livewire\Component;

class KompetensiKeahlian extends Component
{
    public function render()
    {
        return view('livewire.kompetensi-keahlian')->layout('layouts.landing',[
                    'title'=>"Kompetensi Keahlian",
                    'description'=>\Illuminate\Support\Str::limit(strip_tags("kompetensi keahlian"), 150, '...'),
                    'image'=> asset('storage/'."kompetensi keahlian"),
                ]);
    }
}
