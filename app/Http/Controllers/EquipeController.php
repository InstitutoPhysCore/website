<?php

namespace App\Http\Controllers;

use App\Models\Equipe\Membro;
use App\Models\Equipe\Secretaria;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    // Requisições de página
    
    public function index() {
        $secretarias = Secretaria::all();
        return view('equipe.index', ['secretarias' => $secretarias]);
    }

    public function pageDiretoria() {
        $secretarias = Secretaria::all();
        return view('equipe.diretoria', ['secretarias' => $secretarias]);
    }

    public function show(Membro $membro) {
        return view('equipe.show', ['membro' => $membro]);
    }



}
