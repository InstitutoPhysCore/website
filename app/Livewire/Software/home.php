<?php

namespace App\Livewire\Software;

use App\Models\Software\Software;
use Livewire\Component;

class Home extends Component
{

    public function placeholder() {
        return <<<'HTML'
        <x-loading/>
        HTML;
    }

    public function render()
    {
        $softwares = Software::limit(3)->get();
        return view('livewire.software.home-softwares', ['softwares' => $softwares]);
    }
}
