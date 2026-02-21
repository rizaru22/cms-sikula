<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class DaftarProduk extends Component
{
    use WithPagination;

    #[Url]
    public string $search = ''; 
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $profile = \App\Models\Profile::first();
        $daftar_produk = \App\Models\Produk::query()
            ->when($this->search, fn($query) =>
                $query->where('name', 'like', '%'.$this->search.'%')
            )
            ->orderBy('created_at','desc')
            ->paginate(8);

        return view('livewire.daftar-produk',[
            'daftar_produk'=>$daftar_produk,
            'profile'=>$profile
        ])->layout('layouts.landing',[
            'title'=>'Daftar Produk',
            'description'=>'Berisi daftar produk terbaru pada '.$profile->name,
            'image'=> asset('storage/'.$profile->logo),
        ]);
    }
}
