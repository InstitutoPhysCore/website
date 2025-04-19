<?php

namespace App\Livewire;

use App\Models\Software\Software;
use Livewire\Component;

class HomeSoftwares extends Component
{

    public function placeholder() {
        return <<<'HTML'
        <x-loading/>
        HTML;
    }

    public function render()
    {
        $softwares = Software::limit(3)->get();
        return view('livewire.home-softwares', ['softwares' => $softwares]);
    }
}
