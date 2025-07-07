<?php

namespace App\Livewire\Artigo;

use App\Models\Artigo\Artigo;
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
        $artigos = Artigo::limit(3)->get();
        return view('livewire.artigo.home-artigos', ['artigos' => $artigos]);
    }
}
