<?php

namespace App\Livewire\Noticia;

use App\Models\Noticia\Noticia;
use Livewire\Component;

class Show extends Component
{
    public function placeholder() {
        return <<<'HTML'
        <x-loading class="mt-12"/>
        HTML;
    }

    public function render()
    {
        $noticias = Noticia::orderBy('created_at', 'desc')->paginate(6);

        return view('livewire.noticia.show-noticias', ['noticias' => $noticias]);
    }
}
