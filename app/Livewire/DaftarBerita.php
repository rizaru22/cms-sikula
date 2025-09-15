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
    public function render()
    {
        
        $profile = \App\Models\Profile::first();
        $daftar_berita = \App\Models\News::where('published_at','<=',now())
                ->orderBy('published_at','desc')
                ->paginate(9);
        return view('livewire.daftar-berita',['daftar_berita'=>$daftar_berita])
            ->layout('layouts.landing',[
                'title'=>'Daftar Berita',
                'description'=>'Berisi daftar berita terbaru pada'.$profile->name,
                'image'=> asset('images/smws-logo.png'),
            ]);
    }
}
