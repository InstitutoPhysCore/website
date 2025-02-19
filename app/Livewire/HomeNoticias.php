<?php

namespace App\Livewire;

use Livewire\Component;

class HomeNoticias extends Component
{
    public function placeholder() {
        return <<<'HTML'
        <x-loading/>
        HTML;
    }

    public function render()
    {
        return view('livewire.home-noticias');
    }
}
