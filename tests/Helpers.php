<?php

use App\Models\Apostila\Apostila;
use App\Models\Apostila\Serie as ApostilaSerie;
use App\Models\Artigo\Artigo;
use App\Models\Artigo\Categoria as ArtigoCategoria;
use App\Models\Biblioteca\Livro;
use App\Models\Biblioteca\Serie as BibliotecaSerie;
use App\Models\Curso\Aula;
use App\Models\Curso\Serie as CursoSerie;
use App\Models\Equipe\Membro;
use App\Models\Equipe\Secretaria;
use App\Models\Noticia\Noticia;
use App\Models\Software\Software;
use App\Models\User;

function admin(): User
{
    return User::factory()->create(['is_admin' => true]);
}

function visitante(): User
{
    return User::factory()->create(['is_admin' => false]);
}

function secretaria(array $attrs = []): Secretaria
{
    return Secretaria::create($attrs + ['name' => 'Secretaria de Ensino', 'desc' => 'Cuida do ensino']);
}

function membro(array $attrs = []): Membro
{
    return Membro::create($attrs + [
        'name' => 'Maria Souza',
        'function' => 'Professora',
        'bio' => 'Bio curta',
        'secretaria_id' => ($attrs['secretaria_id'] ?? secretaria())->id ?? $attrs['secretaria_id'],
    ]);
}

function autoria(?Membro $m = null): array
{
    return ['author_type' => 0, 'author_id' => ($m ?? membro())->id];
}

function artigo(array $attrs = []): Artigo
{
    return Artigo::create($attrs + autoria() + ['title' => 'Buracos negros', 'desc' => 'Uma introdução', 'content' => "# Olá\n\n<script>alert(1)</script>"]);
}

function noticia(array $attrs = []): Noticia
{
    return Noticia::create($attrs + autoria() + ['title' => 'Nova turma', 'desc' => 'Inscrições abertas', 'priority' => 0, 'content' => 'Texto']);
}

function software(array $attrs = []): Software
{
    return Software::create($attrs + autoria() + ['name' => 'Simulador', 'desc' => 'Simula órbitas', 'owner' => 'physcore', 'repo' => 'simulador']);
}

function cursoSerie(array $attrs = []): CursoSerie
{
    return CursoSerie::create($attrs + ['title' => 'Mecânica Clássica', 'desc' => 'Curso introdutório']);
}

function aula(CursoSerie $serie, array $attrs = []): Aula
{
    return Aula::create($attrs + autoria() + [
        'title' => 'Leis de Newton', 'desc' => 'Primeira aula', 'serie_id' => $serie->id, 'episode' => 1,
        'attachment' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
    ]);
}

function apostila(array $attrs = []): Apostila
{
    return Apostila::create($attrs + autoria() + ['title' => 'Cinemática', 'desc' => 'Resumo', 'attachment' => 'anexos/apostilas/x.pdf']);
}

function livro(array $attrs = []): Livro
{
    return Livro::create($attrs + autoria() + ['title' => 'Física Básica', 'desc' => 'Clássico', 'attachment' => 'anexos/biblioteca/x.pdf']);
}
