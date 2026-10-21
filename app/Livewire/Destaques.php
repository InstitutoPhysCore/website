<?php

namespace App\Livewire;

use App\Support\Catalogo as Config;
use Livewire\Component;

// Últimos itens de um catálogo (usado na página inicial)
class Destaques extends Component
{
    public string $tipo;
    public int $limite = 3;
    public bool $escuro = false;

    public function placeholder()
    {
        return '<x-loading/>';
    }

    public function render()
    {
        return view('livewire.destaques', [
            'config' => Config::config($this->tipo),
            'itens' => Config::consulta($this->tipo)->limit($this->limite)->get(),
        ]);
    }
}
