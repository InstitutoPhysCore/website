<?php

namespace App\Livewire;

use App\Support\Catalogo as Config;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

// Listagem pública com busca, filtro por categoria e ordenação
class Catalogo extends Component
{
    use WithPagination;

    public string $tipo;

    #[Url(as: 'q')]
    public string $busca = '';

    #[Url]
    public ?int $categoria = null;

    #[Url]
    public string $ordem = 'recentes';

    public function mount(string $tipo): void
    {
        $this->tipo = $tipo;
        Config::config($tipo); // falha cedo se o tipo não existir
    }

    public function placeholder()
    {
        return '<x-loading/>';
    }

    public function updated(): void
    {
        $this->resetPage();
    }

    public function selecionarCategoria(?int $id): void
    {
        $this->categoria = $id;
        $this->resetPage();
    }

    public function limpar(): void
    {
        $this->reset('busca', 'categoria', 'ordem');
        $this->resetPage();
    }

    public function render()
    {
        $categorias = Config::categorias($this->tipo);

        // Categoria inexistente (ou removida) na URL é ignorada
        if ($this->categoria && ! $categorias->contains('id', $this->categoria)) {
            $this->categoria = null;
        }

        $ordem = in_array($this->ordem, ['recentes', 'antigos', 'az'], true) ? $this->ordem : 'recentes';

        return view('livewire.catalogo', [
            'config' => Config::config($this->tipo),
            'categorias' => $categorias,
            'itens' => Config::consulta($this->tipo, $this->busca, $this->categoria, $ordem)->paginate(9),
        ]);
    }
}
