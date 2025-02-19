<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Foundation\Configuration\Middleware;

class PainelController extends Controller
{
    // Definir Middleware para o controlador
    public static function middleware(): array
    {
       return [
           new Middleware('can:access dashboard'),
       ];
    }

    // Retornar a Index
    public function index(): View {
        return view('painel.dashboard');
    }
}
