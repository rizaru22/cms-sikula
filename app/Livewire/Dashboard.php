<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public function render()
    {
        $carousels = \App\Models\Carousel::all()
                        ->where('status','active');

        $profile = \App\Models\Profile::first();

        $news = \App\Models\News::where('published_at','<=',now())
                ->orderBy('published_at','desc')
                ->paginate(4);
                
        // dd($news);
        return view('livewire.dashboard',['carousels'=>$carousels,'news'=>$news])
                ->layout('layouts.landing',[
                    'title'=>'Beranda',
                    'description'=>$profile->welcome_message,
                    'image'=> $carousels[0]->image,
                ]);
    }
}
