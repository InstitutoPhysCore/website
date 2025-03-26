<?php

namespace App\Http\Controllers;

use App\Models\Artigo\Artigo;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{
    public function index() {
        return view('artigos.index');
    }

    public function show(Artigo $artigo) {
        return view('artigos.show', ['artigo' => $artigo]);
    }
}
