<?php

namespace App\Livewire\Artigo;

use App\Models\Artigo\Artigo;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = "tailwind";

    public $searchTerm;
    public $categoria;
    public $orderBy = "created_at";
    public $sortOrder = "desc";

    public function updated() {
        $this->resetPage();
    }

    public function render()
    {
        $artigos = Artigo::orderBy($this->orderBy, $this->sortOrder);
        if(! empty($this->searchTerm)) {
            $artigos->orWhere('title','like',"%".$this->searchTerm."%");
            $artigos->orWhere('desc','like',"%".$this->searchTerm."%");
        }
        $artigos = $artigos->paginate(10);

        return view('livewire.artigo.show-artigos', ['artigos' => $artigos]);
    }
}
