<?php

namespace App\Http\Controllers;

use App\Models\Software\Software;

class SoftwareController extends Controller
{

    public function index() {
        return view('softwares.index');
    }

    public function show(Software $software) {
        return view('softwares.show', ['software' => $software->load('categoria')]);
    }

}
