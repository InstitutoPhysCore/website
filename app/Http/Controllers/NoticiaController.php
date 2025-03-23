<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    // Requisições de página
    
    public function index() {
        return view('noticias.index');
    }

    public function show(Noticia $noticia) {
        return view('noticias.show', ['noticia' => $noticia]);
    }

    public function create() {
        return view('noticias.create');
    }

    public function edit(Noticia $noticia) {
        return view('noticias.edit', $noticia);
    }

}
