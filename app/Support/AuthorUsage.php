<?php

namespace App\Support;

use App\Models\Apostila\Apostila;
use App\Models\Artigo\Artigo;
use App\Models\Biblioteca\Livro;
use App\Models\Curso\Aula;
use App\Models\Noticia\Noticia;
use App\Models\Software\Software;

// Conta os conteúdos assinados por um autor (membro, secretaria ou autor externo)
class AuthorUsage
{
    public const MEMBRO = 0;
    public const SECRETARIA = 1;
    public const EXTERNO = 2;

    public static function models(): array
    {
        return [Artigo::class, Noticia::class, Software::class, Aula::class, Apostila::class, Livro::class];
    }

    public static function count(int $type, int $id): int
    {
        return collect(self::models())
            ->sum(fn ($model) => $model::query()->where('author_type', $type)->where('author_id', $id)->count());
    }
}
