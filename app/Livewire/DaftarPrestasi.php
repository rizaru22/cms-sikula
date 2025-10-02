<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class DaftarPrestasi extends Component
{
    use WithPagination;
    #[Url]
    public string $search = '';
    #[Url]
    public $category = null;
    #[Url]
    public $year = null;
    
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $profile = \App\Models\Profile::first();
        $daftar_prestasi = \App\Models\Achievement::query()
            ->when($this->search, fn($query) =>
                $query->where(function($q) {
                    $q->where('title', 'like', '%'.$this->search.'%')
                      ->orWhere('description', 'like', '%'.$this->search.'%');
                })
            )
            ->when($this->category, fn($query) =>
                $query->whereHas('category_achievement', function($q) {
                    $q->where('id', $this->category);
                })
            )
            ->when($this->year, fn($query) =>
                $query->whereYear('date', $this->year)
            )
             ->where('date','<=',now())
                ->orderBy('date','desc')
                ->paginate(8);
        return view('livewire.daftar-prestasi',['daftar_prestasi'=>$daftar_prestasi])
            ->layout('layouts.landing',[
                'title'=>'Daftar Prestasi',
                'description'=>'Berisi daftar prestasi terbaru pada'.$profile->name,
                'image'=> asset('storage/'.$profile->logo),
            ]);
      
    }
}
