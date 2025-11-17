<?php

namespace App\Livewire;

use Livewire\Component;

class Beranda extends Component
{
    public $pilihanMenu = 'lihat';

    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }

    public function render()
    {
        return view('livewire.beranda');
    }
}
