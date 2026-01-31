<?php

namespace App\Livewire;

use Livewire\Component;

class Produk extends Component
{
    public function render()
    {
        return view('livewire.produk')->layout('layouts.landing',[
                    'title'=>"Produk",
                    'description'=>\Illuminate\Support\Str::limit(strip_tags("produk"), 150, '...'),
                    'image'=> asset('storage/'."produk"),
                ]);
    }
}
