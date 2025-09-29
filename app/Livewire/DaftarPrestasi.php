<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class DaftarPrestasi extends Component
{
    use WithPagination;
    public function render()
    {
        $profile = \App\Models\Profile::first();
        $daftar_prestasi = \App\Models\Achievement::where('date','<=',now())
                ->orderBy('date','desc')
                ->paginate(9);
        return view('livewire.daftar-prestasi',['daftar_prestasi'=>$daftar_prestasi])
            ->layout('layouts.landing',[
                'title'=>'Daftar Prestasi',
                'description'=>'Berisi daftar prestasi terbaru pada'.$profile->name,
                'image'=> asset('storage/'.$profile->logo),
            ]);
      
    }
}
