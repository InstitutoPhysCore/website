<?php

namespace App\Http\Controllers;

use App\Models\Apostila\Apostila;

class ApostilaController extends Controller
{
    public function index() {
        return view('apostilas.index');
    }

    public function show(Apostila $apostila) {
        return view('apostilas.show', ['apostila' => $apostila->load('serie.categoria')]);
    }

}
