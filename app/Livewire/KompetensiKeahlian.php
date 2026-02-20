<?php

namespace App\Livewire;

use Livewire\Component;

class KompetensiKeahlian extends Component
{
    public $slug;

    public function mount($slug)
    {
        // Inisialisasi data jika diperlukan
        $this->slug = $slug;

    }
    public function render()
    {
        $kompetensi = \App\Models\KompetensiKeahlian::where('slug', $this->slug)
                ->firstOrFail();

        $kompetensi_lainnya = \App\Models\KompetensiKeahlian::where('slug', '!=', $this->slug)
                ->orderBy('name')
                ->latest()
                ->take(4)
                ->get();

        return view('livewire.kompetensi-keahlian', compact('kompetensi', 'kompetensi_lainnya'))->layout('layouts.landing',[
                    'title'=>"Kompetensi Keahlian",
                    'description'=>\Illuminate\Support\Str::limit(strip_tags($kompetensi->description), 150, '...'),
                    'image'=> asset('storage/'.$kompetensi->logo),
                ]);
    }
}
