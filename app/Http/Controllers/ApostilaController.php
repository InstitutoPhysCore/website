<?php

namespace App\Http\Controllers;

use App\Models\Apostila;
use Illuminate\Http\Request;

class ApostilaController extends Controller
{
        // Requisições de página
    
        public function index() {
            return view('apostilas.index');
        }
    
        public function show(Apostila $apostila) {
            return view('apostilas.show', $apostila);
        }
    
        public function create() {
            return view('apostilas.create');
        }
    
        public function edit(Apostila $apostila) {
            return view('apostilas.edit', $apostila);
        }

}
