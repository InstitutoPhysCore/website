<?php

namespace App\Livewire\Apostila;

use App\Models\Apostila\Apostila;
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
        $apostilas = Apostila::orderBy($this->orderBy, $this->sortOrder);
        if(! empty($this->searchTerm)) {
            $apostilas->orWhere('title','like',"%".$this->searchTerm."%");
            $apostilas->orWhere('desc','like',"%".$this->searchTerm."%");
        }
        $apostilas = $apostilas->paginate(10);

        return view('livewire.apostila.index', ['apostilas' => $apostilas]);
    }
}
