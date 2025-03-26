<?php

namespace App\Http\Controllers;

use App\Models\Software\Categoria;
use App\Models\Software\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{

    public function index() {
        $softwares = Software::all();
        return view('softwares.index', ['softwares' => $softwares]);
    }

    public function show(Software $software) {
        return view('softwares.show', ['software' => $software]);
    }

}
