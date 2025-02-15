<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Secretaria;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    // Requisições de página
    
    public function index() {
        $secretarias = Secretaria::all();
        return view('equipe.index', ['secretarias' => $secretarias]);
    }

    public function show(Equipe $membro) {
        return view('equipe.show', $membro);
    }

    public function create() {
        return view('equipe.create');
    }

    public function edit(Equipe $membro) {
        return view('equipe.edit', $membro);
    }

    public function store(Request $request) {

    }

    public function update(Request $request, Equipe $membro) {

    }

    public function destroy(Request $request, Equipe $membro) {

    }
}
