<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class DaftarPrestasi extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.daftar-prestasi');
    }
}
