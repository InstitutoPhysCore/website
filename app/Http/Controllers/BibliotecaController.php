<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca\Livro;
use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    // Requisições de página
    
    public function index() {
        return view('biblioteca.index');
    }

    public function show(Livro $livro) {
        return view('biblioteca.show', $livro);
    }
    
}
