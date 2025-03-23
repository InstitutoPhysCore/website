<?php

namespace App\Http\Controllers;

use App\Models\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    // Requisições de página
    
    public function index() {
        $softwares = Software::all();
        return view('softwares.index', ['softwares' => $softwares]);
    }

    public function show(Software $software) {
        return view('softwares.show', ['software' => $software]);
    }

    public function create() {
        return view('softwares.create');
    }

    public function edit(Software $software) {
        return view('softwares.edit', ['software' => $software]);
    }

}
