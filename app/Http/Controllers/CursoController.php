<?php

namespace App\Http\Controllers;

use App\Models\Curso\Aula;
use App\Models\Curso\Serie;

class CursoController extends Controller
{
    // Requisições de página

    public function index() {
        return view('cursos.index');
    }

    // Página de um curso (série) com a lista de aulas
    public function show(Serie $serie) {
        $serie->load('categoria');
        $aulas = $serie->aulas()->orderBy('episode')->orderBy('id')->get();

        return view('cursos.show', ['serie' => $serie, 'aulas' => $aulas]);
    }

    public function aula(Aula $aula) {
        $aula->load('serie');
        abort_if(! $aula->serie, 404);

        $aulas = $aula->serie->aulas()->orderBy('episode')->orderBy('id')->get();

        return view('cursos.aula', ['aula' => $aula, 'serie' => $aula->serie, 'aulas' => $aulas]);
    }

}
