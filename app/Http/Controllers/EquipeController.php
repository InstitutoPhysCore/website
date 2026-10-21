<?php

namespace App\Http\Controllers;

use App\Models\Artigo\Artigo;
use App\Models\Equipe\Membro;
use App\Models\Noticia\Noticia;
use App\Support\AuthorUsage;
use App\Models\Equipe\Secretaria;

class EquipeController extends Controller
{
    // Requisições de página

    public function index() {
        $secretarias = Secretaria::with(['diretor', 'membros'])->orderBy('name')->get();
        return view('equipe.index', ['secretarias' => $secretarias]);
    }

    // Diretoria: o diretor de cada secretaria
    public function pageDiretoria() {
        $secretarias = Secretaria::with('diretor')->whereNotNull('diretor_id')->orderBy('name')->get();
        return view('equipe.diretoria', ['secretarias' => $secretarias]);
    }

    public function show(Membro $membro) {
        $contribuicoes = fn (string $model) => $model::where('author_type', AuthorUsage::MEMBRO)
            ->where('author_id', $membro->id)->latest()->get();

        return view('equipe.show', [
            'membro' => $membro->load('secretaria'),
            'artigos' => $contribuicoes(Artigo::class),
            'noticias' => $contribuicoes(Noticia::class),
        ]);
    }

}
