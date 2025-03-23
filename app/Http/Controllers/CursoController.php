<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Requisições de página
    
    public function index() {
        return view('cursos.index');
    }

    public function show(Curso $curso) {
        return view('cursos.show', $curso);
    }

    public function create() {
        return view('cursos.create');
    }

    public function edit(Curso $curso) {
        return view('cursos.edit', $curso);
    }

}
