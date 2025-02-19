<?php

namespace App\Livewire;

use App\Models\Noticia;
use Livewire\Component;

class ShowNoticias extends Component
{
    public function placeholder() {
        return <<<'HTML'
        <x-loading class="mt-12"/>
        HTML;
    }

    public function render()
    {
        $noticias = Noticia::orderBy('created_at', 'desc')->paginate(6);

        return view('livewire.show-noticias', ['noticias' => $noticias]);
    }
}
