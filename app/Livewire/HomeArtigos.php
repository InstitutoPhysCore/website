<?php

namespace App\Livewire;

use App\Models\Artigo;
use Livewire\Component;

class HomeArtigos extends Component
{

    public function placeholder() {
        return <<<'HTML'
        <x-loading/>
        HTML;
    }

    public function render()
    {
        $artigos = Artigo::limit(3)->get();
        return view('livewire.home-artigos', ['artigos' => $artigos]);
    }
}
