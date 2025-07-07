<?php

namespace App\Livewire\Apostila;

use App\Models\Apostila\Categoria;
use Livewire\Component;

class Categorias extends Component
{

    public function placeholder() {
        return <<<'HTML'
        <x-loading/>
        HTML;
    }

    public function render()
    {
        $categorias = Categoria::limit(3)->get();
        return view('livewire.apostila.categorias', ['categorias' => $categorias]);
    }
}