<?php

use App\Filament\Resources\Apostila\ApostilaResource\Pages as ApostilaPages;
use App\Filament\Resources\Artigo\ArtigoResource\Pages as ArtigoPages;
use App\Filament\Resources\Artigo\CategoriaResource\Pages as ArtigoCategoriaPages;
use App\Filament\Resources\Author\AuthorResource\Pages as AuthorPages;
use App\Filament\Resources\Biblioteca\LivroResource\Pages as LivroPages;
use App\Filament\Resources\Curso\AulaResource\Pages as AulaPages;
use App\Filament\Resources\Curso\CategoriaResource\Pages as CursoCategoriaPages;
use App\Filament\Resources\Curso\SerieResource\Pages as CursoSeriePages;
use App\Filament\Resources\Equipe\MembroResource\Pages as MembroPages;
use App\Filament\Resources\Equipe\SecretariaResource\Pages as SecretariaPages;
use App\Filament\Resources\Noticia\NoticiaResource\Pages as NoticiaPages;
use App\Filament\Resources\Software\CategoriaResource\Pages as SoftwareCategoriaPages;
use App\Filament\Resources\Software\SoftwareResource\Pages as SoftwarePages;
use App\Filament\Resources\UserResource\Pages as UserPages;
use App\Models\Artigo\Artigo;
use App\Models\Artigo\Categoria as ArtigoCategoria;
use App\Models\Author\Author;
use App\Models\Curso\Aula;
use App\Models\Curso\Categoria as CursoCategoria;
use App\Models\Curso\Serie as CursoSerie;
use App\Models\Equipe\Membro;
use App\Models\Equipe\Secretaria;
use App\Models\Noticia\Noticia;
use App\Models\Software\Categoria as SoftwareCategoria;
use App\Models\Software\Software;
use App\Models\User;
use Livewire\Livewire;

beforeEach(fn () => $this->actingAs(admin()));

// Todas as páginas de listagem e criação carregam
dataset('rotas do painel', [
    '/painel/artigo/artigos', '/painel/artigo/artigos/create',
    '/painel/artigo/categorias', '/painel/artigo/categorias/create',
    '/painel/noticia/noticias', '/painel/noticia/noticias/create',
    '/painel/software/softwares', '/painel/software/softwares/create',
    '/painel/software/categorias', '/painel/software/categorias/create',
    '/painel/curso/aulas', '/painel/curso/aulas/create',
    '/painel/curso/series', '/painel/curso/series/create',
    '/painel/curso/categorias', '/painel/curso/categorias/create',
    '/painel/apostila/apostilas', '/painel/apostila/apostilas/create',
    '/painel/apostila/series', '/painel/apostila/series/create',
    '/painel/apostila/categorias', '/painel/apostila/categorias/create',
    '/painel/biblioteca/livros', '/painel/biblioteca/livros/create',
    '/painel/biblioteca/series', '/painel/biblioteca/series/create',
    '/painel/biblioteca/categorias', '/painel/biblioteca/categorias/create',
    '/painel/equipe/membros', '/painel/equipe/membros/create',
    '/painel/equipe/secretarias', '/painel/equipe/secretarias/create',
    '/painel/author/authors', '/painel/author/authors/create',
    '/painel/usuarios', '/painel/usuarios/create',
]);

it('renderiza a página do painel', function (string $url) {
    $this->get($url)->assertOk();
})->with('rotas do painel');

test('CRUD de categoria de artigo', function () {
    Livewire::test(ArtigoCategoriaPages\CreateCategoria::class)
        ->fillForm(['name' => 'Física', 'desc' => 'Artigos de física'])
        ->call('create')->assertHasNoFormErrors();
    $cat = ArtigoCategoria::firstWhere('name', 'Física');
    expect($cat)->not->toBeNull();

    Livewire::test(ArtigoCategoriaPages\ListCategorias::class)->assertCanSeeTableRecords([$cat]);

    Livewire::test(ArtigoCategoriaPages\EditCategoria::class, ['record' => $cat->getRouteKey()])
        ->fillForm(['name' => 'Física Moderna'])->call('save')->assertHasNoFormErrors();
    expect($cat->fresh()->name)->toBe('Física Moderna');

    Livewire::test(ArtigoCategoriaPages\EditCategoria::class, ['record' => $cat->getRouteKey()])
        ->callAction('delete');
    $this->assertModelMissing($cat);
});

test('validação do servidor impede campos obrigatórios vazios', function () {
    Livewire::test(ArtigoCategoriaPages\CreateCategoria::class)
        ->fillForm(['name' => '', 'desc' => ''])->call('create')
        ->assertHasFormErrors(['name' => 'required', 'desc' => 'required']);

    Livewire::test(NoticiaPages\CreateNoticia::class)
        ->fillForm(['title' => '', 'priority' => -1])->call('create')
        ->assertHasFormErrors(['title' => 'required', 'priority', 'author_id' => 'required']);
});

test('CRUD de artigo com categoria e autor', function () {
    $cat = ArtigoCategoria::create(['name' => 'Astro', 'desc' => 'x']);
    $m = membro();

    Livewire::test(ArtigoPages\CreateArtigo::class)
        ->fillForm([
            'title' => 'Estrelas', 'desc' => 'Sobre estrelas', 'author_type' => 0, 'author_id' => $m->id,
            'categoria_id' => $cat->id, 'content' => '# Estrelas',
        ])->call('create')->assertHasNoFormErrors();

    $artigo = Artigo::firstWhere('title', 'Estrelas');
    expect($artigo->categoria_id)->toBe($cat->id)->and($artigo->author->is($m))->toBeTrue();

    Livewire::test(ArtigoPages\EditArtigo::class, ['record' => $artigo->getRouteKey()])
        ->fillForm(['title' => 'Estrelas e Galáxias', 'categoria_id' => null])->call('save')->assertHasNoFormErrors();
    expect($artigo->fresh()->title)->toBe('Estrelas e Galáxias')->and($artigo->fresh()->categoria_id)->toBeNull();

    Livewire::test(ArtigoPages\ListArtigos::class)->assertCanSeeTableRecords([$artigo->fresh()])
        ->callTableAction('delete', $artigo);
    $this->assertModelMissing($artigo);
});

test('CRUD de notícia', function () {
    $m = membro();
    Livewire::test(NoticiaPages\CreateNoticia::class)
        ->fillForm(['title' => 'Aviso', 'desc' => 'd', 'priority' => 3, 'author_type' => 0, 'author_id' => $m->id, 'content' => 'Texto'])
        ->call('create')->assertHasNoFormErrors();
    $n = Noticia::firstWhere('title', 'Aviso');
    expect($n->priority)->toBe(3);

    Livewire::test(NoticiaPages\EditNoticia::class, ['record' => $n->getRouteKey()])
        ->fillForm(['priority' => 9])->call('save');
    expect($n->fresh()->priority)->toBe(9);

    Livewire::test(NoticiaPages\EditNoticia::class, ['record' => $n->getRouteKey()])->callAction('delete');
    $this->assertModelMissing($n);
});

test('CRUD de software e categoria de software', function () {
    $m = membro();
    $cat = SoftwareCategoria::create(['name' => 'Simuladores', 'desc' => 'x']);

    Livewire::test(SoftwarePages\CreateSoftware::class)
        ->fillForm(['name' => 'Orbitas', 'desc' => 'd', 'author_type' => 0, 'author_id' => $m->id, 'categoria_id' => $cat->id, 'owner' => 'physcore', 'repo' => 'orbitas'])
        ->call('create')->assertHasNoFormErrors();
    $s = Software::firstWhere('name', 'Orbitas');
    expect($s->repo_url)->toBe('https://github.com/physcore/orbitas');

    Livewire::test(SoftwarePages\EditSoftware::class, ['record' => $s->getRouteKey()])
        ->fillForm(['repo' => 'orbitas-v2'])->call('save')->assertHasNoFormErrors();
    expect($s->fresh()->repo)->toBe('orbitas-v2');

    // excluir categoria mantém o software, sem categoria
    Livewire::test(SoftwareCategoriaPages\EditCategoria::class, ['record' => $cat->getRouteKey()])->callAction('delete');
    $this->assertModelMissing($cat);
    expect($s->fresh()->categoria_id)->toBeNull();

    Livewire::test(SoftwarePages\EditSoftware::class, ['record' => $s->getRouteKey()])->callAction('delete');
    $this->assertModelMissing($s);
});

test('CRUD de cursos: categoria, série e aula', function () {
    $m = membro();

    Livewire::test(CursoCategoriaPages\CreateCategoria::class)
        ->fillForm(['name' => 'Mecânica', 'desc' => 'x'])->call('create')->assertHasNoFormErrors();
    $cat = CursoCategoria::firstWhere('name', 'Mecânica');

    Livewire::test(CursoSeriePages\CreateSerie::class)
        ->fillForm(['title' => 'Newton', 'desc' => 'd', 'categoria_id' => $cat->id])->call('create')->assertHasNoFormErrors();
    $serie = CursoSerie::firstWhere('title', 'Newton');
    expect($serie->categoria_id)->toBe($cat->id);

    Livewire::test(AulaPages\CreateAula::class)
        ->fillForm(['title' => 'Aula 1', 'desc' => 'd', 'author_type' => 0, 'author_id' => $m->id, 'serie_id' => $serie->id, 'episode' => 1, 'attachment' => 'https://youtu.be/dQw4w9WgXcQ'])
        ->call('create')->assertHasNoFormErrors();
    $aula = Aula::firstWhere('title', 'Aula 1');

    Livewire::test(AulaPages\CreateAula::class)
        ->fillForm(['title' => 'x', 'desc' => 'd', 'author_type' => 0, 'author_id' => $m->id, 'serie_id' => $serie->id, 'episode' => 2, 'attachment' => 'não é url'])
        ->call('create')->assertHasFormErrors(['attachment']);

    // série com aulas não pode ser excluída
    Livewire::test(CursoSeriePages\EditSerie::class, ['record' => $serie->getRouteKey()])->callAction('delete');
    $this->assertModelExists($serie);

    Livewire::test(AulaPages\EditAula::class, ['record' => $aula->getRouteKey()])->callAction('delete');
    $this->assertModelMissing($aula);

    Livewire::test(CursoSeriePages\EditSerie::class, ['record' => $serie->getRouteKey()])->callAction('delete');
    $this->assertModelMissing($serie);
});

test('excluir categoria de curso mantém as séries acessíveis', function () {
    $cat = CursoCategoria::create(['name' => 'C', 'desc' => 'x']);
    $serie = cursoSerie(['categoria_id' => $cat->id]);

    Livewire::test(CursoCategoriaPages\ListCategorias::class)->callTableAction('delete', $cat);

    $this->assertModelMissing($cat);
    expect($serie->fresh()->categoria_id)->toBeNull();
    $this->get(route('cursos.show', $serie))->assertOk();
});

test('CRUD de equipe: secretaria, membro e diretor', function () {
    Livewire::test(SecretariaPages\CreateSecretaria::class)
        ->fillForm(['name' => 'Tecnologia', 'desc' => 'TI'])->call('create')->assertHasNoFormErrors();
    $sec = Secretaria::firstWhere('name', 'Tecnologia');

    Livewire::test(MembroPages\CreateMembro::class)
        ->fillForm(['name' => 'Ana', 'secretaria_id' => $sec->id, 'function' => 'Dev', 'bio' => 'bio'])
        ->call('create')->assertHasNoFormErrors();
    $ana = Membro::firstWhere('name', 'Ana');
    expect($ana->user_id)->toBeNull();

    Livewire::test(SecretariaPages\EditSecretaria::class, ['record' => $sec->getRouteKey()])
        ->fillForm(['diretor_id' => $ana->id])->call('save')->assertHasNoFormErrors();
    expect($sec->fresh()->diretor->is($ana))->toBeTrue();

    // secretaria com membros não pode ser excluída
    Livewire::test(SecretariaPages\EditSecretaria::class, ['record' => $sec->getRouteKey()])->callAction('delete');
    $this->assertModelExists($sec);

    // excluir o diretor limpa a diretoria
    Livewire::test(MembroPages\EditMembro::class, ['record' => $ana->getRouteKey()])->callAction('delete');
    $this->assertModelMissing($ana);
    expect($sec->fresh()->diretor_id)->toBeNull();
});

test('membro que assina conteúdo não pode ser excluído', function () {
    $m = membro();
    artigo(autoria($m));

    Livewire::test(MembroPages\EditMembro::class, ['record' => $m->getRouteKey()])->callAction('delete');

    $this->assertModelExists($m);
});

test('CRUD de autor externo', function () {
    Livewire::test(AuthorPages\CreateAuthor::class)
        ->fillForm(['name' => 'Carl', 'link' => 'https://example.com/carl'])->call('create')->assertHasNoFormErrors();
    $a = Author::firstWhere('name', 'Carl');

    Livewire::test(AuthorPages\EditAuthor::class, ['record' => $a->getRouteKey()])
        ->fillForm(['name' => 'Carl Sagan'])->call('save');
    expect($a->fresh()->name)->toBe('Carl Sagan');

    artigo(['author_type' => 2, 'author_id' => $a->id]);
    Livewire::test(AuthorPages\EditAuthor::class, ['record' => $a->getRouteKey()])->callAction('delete');
    $this->assertModelExists($a);
});

test('CRUD de usuários: senha opcional na edição, e-mail único', function () {
    Livewire::test(UserPages\CreateUser::class)
        ->fillForm(['name' => 'Novo', 'email' => 'novo@example.com', 'password' => 'segredo123', 'is_admin' => false])
        ->call('create')->assertHasNoFormErrors();
    $u = User::firstWhere('email', 'novo@example.com');
    expect(Hash::check('segredo123', $u->password))->toBeTrue();

    Livewire::test(UserPages\CreateUser::class)
        ->fillForm(['name' => 'Dup', 'email' => 'novo@example.com', 'password' => 'segredo123'])
        ->call('create')->assertHasFormErrors(['email' => 'unique']);

    Livewire::test(UserPages\EditUser::class, ['record' => $u->getRouteKey()])
        ->fillForm(['name' => 'Renomeado', 'password' => ''])->call('save')->assertHasNoFormErrors();
    expect($u->fresh()->name)->toBe('Renomeado')->and(Hash::check('segredo123', $u->fresh()->password))->toBeTrue();

    Livewire::test(UserPages\EditUser::class, ['record' => $u->getRouteKey()])->callAction('delete');
    $this->assertModelMissing($u);
});

test('mensagens de validação estão em português', function () {
    $msg = Livewire::test(ArtigoCategoriaPages\CreateCategoria::class)
        ->fillForm(['name' => '', 'desc' => ''])->call('create')->errors()->get('data.name')[0] ?? '';

    expect($msg)->not->toContain('validation.')->and($msg)->toContain('obrigatório');
});
