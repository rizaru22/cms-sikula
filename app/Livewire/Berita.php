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
        
        return view('livewire.berita',['news'=>$news])
                ->layout('layouts.landing',[
                    'title'=>$news->title,
                    'description'=>\Illuminate\Support\Str::limit(strip_tags($news->content), 150, '...'),
                    'image'=> asset('storage/'.$news->image),
                ]);
    }
}
