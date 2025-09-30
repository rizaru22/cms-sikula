<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
/**
 * @method \Livewire\Component layout(string $view, array $data = [])
 */
class Dashboard extends Component
{
    use WithPagination;
    public function render()
    {
        $carousels = \App\Models\Carousel::where('status','active')->get();
        $profile = \App\Models\Profile::first();

        $news = \App\Models\News::where('published_at','<=',now())
                ->orderBy('published_at','desc')
                ->paginate(6);
                
        $achievement=\App\Models\Achievement::all()->sortByDesc('date')->take(3);

        return view('livewire.dashboard',[
                    'carousels'=>$carousels,
                    'news'=>$news,
                    'achievement'=>$achievement
                    ])  
                ->layout('layouts.landing',[
                    'title'=>'Beranda',
                    'description'=>$profile->welcome_message,
                    'image'=> $carousels[0]->image,
                ]);
    }
}
