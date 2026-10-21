<?php

namespace App\Livewire\Noticia;

use App\Models\Noticia\Noticia;
use Livewire\Component;

// Notícias em destaque (maior prioridade e mais recentes)
class Home extends Component
{
    public function placeholder()
    {
        return '<x-loading/>';
    }

    public function render()
    {
        $noticias = Noticia::orderByDesc('priority')->latest()->latest('id')->limit(4)->get();

        return view('livewire.noticia.home', ['noticias' => $noticias]);
    }
}
