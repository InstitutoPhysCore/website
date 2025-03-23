<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{
    // Requisições de página
    
    public function index() {
        return view('artigos.index');
    }

    public function show(Artigo $artigo) {
        return view('artigos.show', ['artigo' => $artigo]);
    }

    public function create() {
        return view('artigos.create');
    }

    public function edit(Artigo $artigo) {
        return view('artigos.edit', $artigo);
    }
}
