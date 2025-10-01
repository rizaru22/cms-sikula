<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
/**
 * @method \Livewire\Component layout(string $view, array $data = [])
 */
class DaftarBerita extends Component
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
        // dd($this->search);
        logger("search: " . $this->search);
        $profile = \App\Models\Profile::first();
       $daftar_berita = \App\Models\News::query()
        ->when($this->search, fn($query) =>
            $query->where(function($q) {
                $q->where('title', 'like', '%'.$this->search.'%')
                  ->orWhere('content', 'like', '%'.$this->search.'%');
            })
        )
        ->where('published_at', '<=', now())
        ->orderBy('published_at','desc')
        ->paginate(8);

        return view('livewire.daftar-berita',['daftar_berita'=>$daftar_berita])
            ->layout('layouts.landing',[
                'title'=>'Daftar Berita',
                'description'=>'Berisi daftar berita terbaru pada'.$profile->name,
                'image'=> asset('storage/'.$profile->logo),
            ]);
    }
}
