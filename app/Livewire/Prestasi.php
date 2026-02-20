<?php

namespace App\Livewire;

use Livewire\Component;

class Prestasi extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $this->achievement = \App\Models\Achievement::where('slug', $this->slug)->firstOrFail();
        return view('livewire.prestasi', ['achievement' => $this->achievement])->layout('layouts.landing',[
            'title'=>$this->achievement->title,
            'description'=>\Illuminate\Support\Str::limit(strip_tags($this->achievement->description), 150, '...'),
            'image'=> asset('storage/'.$this->achievement->image),
        ]);
    }
}
