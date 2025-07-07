<?php

namespace App\Livewire\Noticia;

use App\Models\Noticia\Noticia;
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
        $noticias = Noticia::orderBy('priority', 'DESC')->orderBy('created_at', 'DESC')->limit(4)->get();
        return view('livewire.noticia.home-noticias', ['noticias' => $noticias]);
    }
}
