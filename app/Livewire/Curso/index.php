<?php

namespace App\Livewire\Curso;

use App\Models\Curso\Serie;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
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
        $series = Serie::orderBy($this->orderBy, $this->sortOrder);
        if(! empty($this->searchTerm)) {
            $series->orWhere('title','like',"%".$this->searchTerm."%");
            $series->orWhere('desc','like',"%".$this->searchTerm."%");
        }
        $series = $series->paginate(10);

        return view('livewire.curso.index', ['series' => $series]);
    }
}
