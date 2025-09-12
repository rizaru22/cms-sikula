<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $carousels = \App\Models\Carousel::all()
                        ->where('status','active');

        $profile = \App\Models\Profile::first();
       
        return view('livewire.dashboard',['carousels'=>$carousels,])
                ->layout('layouts.landing',[
                    'title'=>'Beranda',
                    'description'=>$profile->welcome_message,
                    'image'=> $carousels[0]->image,
                ]);
    }
}
