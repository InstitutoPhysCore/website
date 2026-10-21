<?php

namespace App\Livewire\Noticia;

use App\Models\Noticia\Noticia;
use Livewire\Component;
use Livewire\WithPagination;

// Lista paginada de todas as notícias
class Show extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return '<x-loading class="mt-12"/>';
    }

    public function render()
    {
        return view('livewire.noticia.show', [
            'noticias' => Noticia::latest()->latest('id')->paginate(6),
        ]);
    }
}
