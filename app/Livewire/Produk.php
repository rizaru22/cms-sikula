<?php

namespace App\Livewire;

use Livewire\Component;

class Produk extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $product = \App\Models\Produk::where('slug', $this->slug)->firstOrFail();
        $otherProducts = \App\Models\Produk::where('slug', '!=', $this->slug)->limit(4)->get();
        return view('livewire.produk', compact('product','otherProducts'))->layout('layouts.landing',[
                    'title'=>"Produk",
                    'description'=>\Illuminate\Support\Str::limit(strip_tags($product->description), 150, '...'),
                    'image'=> asset('storage/'.$product->image),
                ]);
    }
}
