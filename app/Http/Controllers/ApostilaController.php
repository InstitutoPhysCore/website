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
    
        public function store(Request $request) {
    
        }
    
        public function update(Request $request, Apostila $apostila) {
    
        }
    
        public function destroy(Request $request, Apostila $apostila) {
    
        }
}
