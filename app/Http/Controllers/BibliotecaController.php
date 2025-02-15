<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    // Requisições de página
    
    public function index() {
        return view('biblioteca.index');
    }

    public function show(Biblioteca $biblioteca) {
        return view('biblioteca.show', $biblioteca);
    }

    public function create() {
        return view('biblioteca.create');
    }

    public function edit(Biblioteca $biblioteca) {
        return view('biblioteca.edit', $biblioteca);
    }

    // Requisições de formulários

    public function store(Request $request) {

    }

    public function update(Request $request, Biblioteca $biblioteca) {

    }

    public function destroy(Request $request, Biblioteca $biblioteca) {

    }
}
