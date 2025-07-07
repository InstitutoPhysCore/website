<?php

namespace App\Livewire\Curso;

use App\Models\Curso\Categoria;
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
        return view('livewire.curso.categorias', ['categorias' => $categorias]);
    }
}