<?php

namespace App\Http\Controllers;

use App\Models\Noticia\Noticia;
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

}
