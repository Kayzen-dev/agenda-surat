<?php

namespace App\Livewire\Sekre;

use Livewire\Component;

class SekreIndex extends Component
{

    public $currentTab = 'suratMasuk'; 

    public function setTab($tab)
    {
        $this->currentTab = $tab;
    }


    public function render()
    {
        return view('livewire.sekre.sekre-index');
    }
}
