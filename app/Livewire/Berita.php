<?php

namespace App\Livewire;

use Livewire\Component;

class Berita extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $news = \App\Models\News::where('slug', $this->slug)
                ->firstOrFail();
        $berita_lainnya = \App\Models\News::where('slug', '!=', $this->slug)
                ->latest()
                ->take(3)
                ->get();
        
        return view('livewire.berita',['news'=>$news, 'berita_lainnya'=>$berita_lainnya])
                ->layout('layouts.landing',[
                    'title'=>$news->title,
                    'description'=>\Illuminate\Support\Str::limit(strip_tags($news->content), 150, '...'),
                    'image'=> asset('storage/'.$news->image),
                ]);
    }
} 
