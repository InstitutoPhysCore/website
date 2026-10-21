<?php

use App\Models\Apostila\Categoria as ApostilaCategoria;
use App\Models\Artigo\Categoria as ArtigoCategoria;
use App\Models\Curso\Categoria as CursoCategoria;
use Livewire\Livewire;
use App\Livewire\Catalogo;

dataset('páginas públicas', [
    '/', '/artigos', '/noticias', '/cursos', '/apostilas', '/biblioteca', '/equipe', '/equipe/diretoria',
    '/quemsomos', '/objetivos', '/apresentacoes', '/projetos', '/acoes', '/iniciacaocientifica', '/privacidade',
    '/login', '/register',
]);

it('carrega a página pública sem dados', function (string $url) {
    $this->get($url)->assertOk();
})->with('páginas públicas');

test('softwares exigem login, conforme regra existente', function () {
    $s = software();

    $this->get('/softwares')->assertRedirect('/login');
    $this->get(route('softwares.show', $s))->assertRedirect('/login');

    $this->actingAs(visitante());
    $this->get('/softwares')->assertOk();
    $this->get(route('softwares.show', $s))->assertOk()->assertSee('Simulador')->assertSee('github.com/physcore/simulador');
});

test('conteúdo inexistente retorna 404', function (string $url) {
    $this->actingAs(visitante());
    $this->get($url)->assertNotFound();
})->with(['/artigos/999', '/noticias/999', '/cursos/999', '/cursos/aulas/999', '/apostilas/999', '/biblioteca/999', '/softwares/999', '/equipe/membro/999', '/pagina-que-nao-existe']);

test('a página inicial mostra os registros criados (de 1 a 4 notícias)', function () {
    Livewire::test(\App\Livewire\Noticia\Home::class)->assertSee('Pelo visto');

    foreach (['Primeira', 'Segunda', 'Terceira', 'Quarta'] as $i => $t) {
        noticia(['title' => "Notícia $t", 'priority' => $i]);
        $r = $this->get('/');
        $r->assertOk();
    }

    artigo(['title' => 'Artigo na home']);
    Livewire::test(\App\Livewire\Noticia\Home::class)->assertSee('Notícia Quarta');
    Livewire::test(\App\Livewire\Destaques::class, ['tipo' => 'artigos'])->assertSee('Artigo na home');
});

test('detalhe de artigo mostra autor, categoria e remove HTML perigoso do markdown', function () {
    $cat = ArtigoCategoria::create(['name' => 'Cosmologia', 'desc' => 'x']);
    $a = artigo(['categoria_id' => $cat->id]);

    $this->get(route('artigos.show', $a))
        ->assertOk()->assertSee('Buracos negros')->assertSee('Cosmologia')->assertSee('Maria Souza')
        ->assertDontSee('<script>alert(1)</script>', false);
});

test('detalhe de notícia', function () {
    $this->get(route('noticias.show', noticia()))->assertOk()->assertSee('Nova turma');
});

test('catálogo de artigos filtra por categoria, busca e ordenação', function () {
    $fis = ArtigoCategoria::create(['name' => 'Física', 'desc' => 'x']);
    $mat = ArtigoCategoria::create(['name' => 'Matemática', 'desc' => 'x']);
    ArtigoCategoria::create(['name' => 'Vazia', 'desc' => 'sem artigos']);
    artigo(['title' => 'Quântica', 'categoria_id' => $fis->id]);
    artigo(['title' => 'Cálculo', 'categoria_id' => $mat->id]);
    artigo(['title' => 'Sem categoria']);

    $c = Livewire::test(Catalogo::class, ['tipo' => 'artigos']);
    $c->assertSee('Quântica')->assertSee('Cálculo')->assertSee('Sem categoria')
      ->assertSee('Física')->assertSee('Matemática')->assertDontSee('Vazia');

    $c->call('selecionarCategoria', $fis->id)->assertSee('Quântica')->assertDontSee('Cálculo')->assertDontSee('Sem categoria');
    $c->call('selecionarCategoria', null)->set('busca', 'lcul')->assertSee('Cálculo')->assertDontSee('Quântica');
    $c->set('busca', 'inexistente')->assertSee('Não foi possível encontrar');

    // categoria inexistente na URL é ignorada
    Livewire::withQueryParams(['categoria' => 9999])->test(Catalogo::class, ['tipo' => 'artigos'])->assertSee('Quântica');
});

test('categoria excluída deixa o artigo acessível e sem categoria', function () {
    $cat = ArtigoCategoria::create(['name' => 'Temp', 'desc' => 'x']);
    $a = artigo(['categoria_id' => $cat->id]);

    $cat->delete();

    expect($a->fresh()->categoria_id)->toBeNull();
    $this->get(route('artigos.show', $a))->assertOk();
    Livewire::test(Catalogo::class, ['tipo' => 'artigos'])->assertSee('Buracos negros');
});

test('catálogo estado vazio', function () {
    Livewire::test(Catalogo::class, ['tipo' => 'cursos'])->assertSee('Ainda não há cursos publicados');
});

test('cursos: listagem por categoria, série com aulas e página da aula', function () {
    $cat = CursoCategoria::create(['name' => 'Mecânica', 'desc' => 'x']);
    $serie = cursoSerie(['categoria_id' => $cat->id]);
    $a1 = aula($serie);
    $a2 = aula($serie, ['title' => 'Segunda aula', 'episode' => 2]);

    Livewire::test(Catalogo::class, ['tipo' => 'cursos'])->call('selecionarCategoria', $cat->id)->assertSee('Mecânica Clássica');
    $this->get(route('cursos.show', $serie))->assertOk()->assertSee('Leis de Newton')->assertSee('Segunda aula');
    $this->get(route('cursos.aula', $a1))->assertOk()->assertSee('youtube-nocookie.com/embed/dQw4w9WgXcQ', false)->assertSee('Segunda aula');
});

test('série de curso sem aulas mostra estado vazio', function () {
    $this->get(route('cursos.show', cursoSerie()))->assertOk()->assertSee('ainda não tem aulas');
});

test('apostilas e biblioteca: filtro via série/categoria e detalhe', function () {
    $cat = ApostilaCategoria::create(['name' => 'Ensino Médio', 'desc' => 'x']);
    $serie = App\Models\Apostila\Serie::create(['title' => 'Série A', 'desc' => 'd', 'categoria_id' => $cat->id]);
    $com = apostila(['title' => 'Com série', 'serie_id' => $serie->id, 'volume' => 2]);
    $sem = apostila(['title' => 'Solta']);

    Livewire::test(Catalogo::class, ['tipo' => 'apostilas'])
        ->assertSee('Com série')->assertSee('Solta')
        ->call('selecionarCategoria', $cat->id)->assertSee('Com série')->assertDontSee('Solta');

    $this->get(route('apostilas.show', $com))->assertOk()->assertSee('Série A')->assertSee('Baixar apostila');
    $this->get(route('apostilas.show', $sem))->assertOk();

    $l = livro();
    Livewire::test(Catalogo::class, ['tipo' => 'biblioteca'])->assertSee('Física Básica');
    $this->get(route('biblioteca.show', $l))->assertOk()->assertSee('Física Básica');
});

test('equipe, diretoria e perfil do membro', function () {
    $sec = secretaria();
    $m = membro(['secretaria_id' => $sec]);
    $sec->update(['diretor_id' => $m->id]);
    artigo(autoria($m));

    $this->get('/equipe')->assertOk()->assertSee('Maria Souza')->assertSee('Secretaria de Ensino');
    $this->get('/equipe/diretoria')->assertOk()->assertSee('Maria Souza');
    $this->get(route('equipe.show', $m))->assertOk()->assertSee('Professora')->assertSee('Buracos negros');
});

test('alterações no banco refletem imediatamente nas páginas públicas', function () {
    $a = artigo();
    $this->get(route('artigos.show', $a))->assertSee('Buracos negros');

    $a->update(['title' => 'Título atualizado']);
    $this->get(route('artigos.show', $a))->assertSee('Título atualizado')->assertDontSee('Buracos negros');

    $a->delete();
    $this->get(route('artigos.show', $a->id))->assertNotFound();
});

test('páginas públicas não expõem formulários administrativos', function () {
    $this->get('/artigos')->assertDontSee('painel/artigo/artigos/create');
    $this->post('/artigos', [])->assertStatus(405);
    $this->delete('/artigos/1')->assertStatus(405);
});
