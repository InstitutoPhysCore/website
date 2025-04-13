<?php

namespace App\Livewire;

use App\Models\Noticia\Noticia;
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
        $noticias = Noticia::orderBy('priority', 'DESC')->orderBy('created_at', 'DESC')->limit(4)->get();
        return view('livewire.home-noticias', ['noticias' => $noticias]);
    }
}
