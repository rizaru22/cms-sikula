<?php

namespace App\Livewire;

use Livewire\Component;

class Ppdb extends Component
{
    public function render()
    {
        $profile = \App\Models\Profile::first();
        $ppdb = \App\Models\Ppdb::where('is_active', true)->where('status', 'published')->first();
        if (!$ppdb) {
            abort(404);
        }
        return view('livewire.ppdb', compact('ppdb'))->layout('layouts.landing',[
            'title'=>'PPDB',
            'description'=>'Informasi Penerimaan Peserta Didik Baru (PPDB) '.$profile->name.' - '.$profile->description,
            'image'=> asset('storage/'.$profile->logo),
        ]);
    }
}
