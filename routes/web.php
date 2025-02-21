<?php

use Illuminate\View\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ApostilaController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PainelController;

Route::view('/', 'home')->name('home');

Route::view('/dev', 'playground')->name('dev');

// Rotas do Painel de Controle
Route::controller(PainelController::class)->group(function () {
    Route::get('/painel', 'index');
});

// Rotas de Páginas Estáticas
Route::view('/quemsomos', 'static.quemsomos')->name('page.quemsomos');                      // Página Quem Somos
Route::view('/objetivos', 'static.objetivos')->name('page.objetivos');                      // Página de Objetivos
Route::view('/apresentacoes', 'static.apresentacoes')->name('page.apresentacoes');          // Página de Apresentações
Route::view('/projetos', 'static.projetos')->name('page.projetos');                         // Página de Projetos
Route::view('/acoes', 'static.acoes')->name('page.acoes');                                  // Página de Ações Sociais
Route::view('/iniciacaocientifica', 'static.iniciacao')->name('page.iniciacao');            // Página de Iniciação Cientifica

// Rotas da Equipe
Route::controller(EquipeController::class)->group(function () {

    // Requisições de Página
    Route::get('/equipe', 'index')->name('equipe.index');                                   // Página inicial
    Route::get('/equipe/diretoria', 'diretoriaPage')->name('equipe.page.diretoria');        // Página da diretoria
    Route::get('/equipe/membro/{membro}', 'show')->name('equipe.show');                     // Página de detalhes do membro

    // Rotas do Painel de Controle
    Route::middleware('can:modify equipe')->group(function () {
        Route::get('/painel/equipe/criar', 'create')->name('equipe.create');                // Página de criação de membros
        Route::get('/painel/equipe/{membro}/editar', 'edit')->name('equipe.edit');          // Página de edição do membros

        // Envios de formulário
        Route::post('/equipe', 'store')->name('equipe.store');                              // Guardar recurso
        Route::put('/equipe/{membro}', 'update')->name('equipe.update');                    // Atualizar recurso
        Route::delete('/equipe/{membro}', 'destroy')->name('equipe.destroy');               // Destruir recurso
    });
});

// Rotas dos Artigos
Route::controller(ArtigoController::class)->group(function () {

    // Requisições de Página
    Route::get('/artigos', 'index')->name('artigos.index');                                 // Página inicial
    Route::get('/artigos/{artigo}', 'show')->name('artigos.show');                          // Página de detalhes do artigo

    // Rotas do Painel de Controle
    Route::middleware('can:modify artigos')->group(function () {
        Route::get('/painel/artigos/criar', 'create')->name('artigos.create');              // Página de criação de artigos
        Route::get('/painel/artigos/{artigo}/editar', 'edit')->name('artigso.edit');        // Página de edição do artigo

        // Envios de formulário
        Route::post('/artigos', 'store')->name('artigos.store');                            // Guardar recurso
        Route::put('/artigos/{artigo}', 'update')->name('artigos.update');                  // Atualizar recurso
        Route::delete('/artigos/{artigo}', 'destroy')->name('artigos.destroy');             // Destruir recurso
    });
});

// Rotas das Noticias
Route::controller(NoticiaController::class)->group(function () {

    // Requisições de Página
    Route::get('/noticias', 'index')->name('noticias.index');                               // Página inicial
    Route::get('/noticias/{noticia}', 'show')->name('noticias.show');                       // Página de detalhes da noticia

    // Rotas do Painel de Controle
    Route::middleware('can:modify noticias')->group(function () {
        Route::get('/painel/noticias/criar', 'create')->name('noticias.create');            // Página de criação de noticias
        Route::get('/painel/noticias/{noticia}/editar', 'edit')->name('noticias.edit');     // Página de edição das noticias

        // Envios de formulário
        Route::post('/noticias', 'store')->name('noticias.store');                          // Guardar recurso
        Route::put('/noticias/{noticia}', 'update')->name('noticias.update');               // Atualizar recurso
        Route::delete('/noticias/{noticia}', 'destroy')->name('noticias.destroy');          // Destruir recurso
    });
});

// Rotas das Softwares
Route::controller(SoftwareController::class)->group(function () {

    // Requisições de Página
    Route::get('/softwares', 'index')->name('softwares.index')->middleware('auth');                             // Página inicial
    Route::get('/softwares/{software}', 'show')->name('softwares.show');                    // Página de detalhes da software

    // Rotas do Painel de Controle
    Route::middleware('can:modify softwares')->group(function () {
        Route::get('/painel/softwares/criar', 'create')->name('softwares.create');          // Página de criação de softwares
        Route::get('/painel/softwares/{software}/editar', 'edit')->name('softwares.edit');  // Página de edição das softwares

        // Envios de formulário
        Route::post('/softwares', 'store')->name('softwares.store');                        // Guardar recurso
        Route::put('/softwares/{software}', 'update')->name('softwares.update');            // Atualizar recurso
        Route::delete('/softwares/{software}', 'destroy')->name('softwares.destroy');       // Destruir recurso
    });
});

// Rotas das Apostilas
Route::controller(ApostilaController::class)->group(function () {

    // Requisições de Página
    Route::get('/apostilas', 'index')->name('apostilas.index');                             // Página inicial
    Route::get('/apostilas/{apostila}', 'show')->name('apostilas.show');                    // Página de detalhes da apostila

    // Rotas do Painel de Controle
    Route::middleware(['auth','can:modify apostilas'])->group(function () {
        Route::get('/painel/apostilas/criar', 'create')->name('apostilas.create');          // Página de criação de apostilas
        Route::get('/painel/apostilas/{apostila}/editar', 'edit')->name('apostilas.edit');  // Página de edição das apostilas

        // Envios de formulário
        Route::post('/apostilas', 'store')->name('apostilas.store');                        // Guardar recurso
        Route::put('/apostilas/{apostila}', 'update')->name('apostilas.update');            // Atualizar recurso
        Route::delete('/apostilas/{apostila}', 'destroy')->name('apostilas.destroy');       // Destruir recurso
    });
});

// Rotas da Biblioteca
Route::controller(BibliotecaController::class)->group(function () {

    // Requisições de Página
    Route::get('/biblioteca', 'index')->name('biblioteca.index');                           // Página inicial
    Route::get('/biblioteca/{livro}', 'show')->name('biblioteca.show');                     // Página de detalhes da biblioteca

    // Rotas do Painel de Controle
    Route::middleware('can:modify biblioteca')->group(function () {
        Route::get('/painel/biblioteca/criar', 'create')->name('biblioteca.create');        // Página de criação de bibliotecas
        Route::get('/painel/biblioteca/{livro}/editar', 'edit')->name('biblioteca.edit');   // Página de edição das bibliotecas

        // Envios de formulário
        Route::post('/biblioteca', 'store')->name('biblioteca.store');                      // Guardar recurso
        Route::put('/biblioteca/{livro}', 'update')->name('biblioteca.update');             // Atualizar recurso
        Route::delete('/biblioteca/{livro}', 'destroy')->name('biblioteca.destroy');        // Destruir recurso
    });
});

// Rotas dos Cursos
Route::controller(CursoController::class)->group(function () {

    // Requisições de Página
    Route::get('/cursos', 'index')->name('cursos.index');                                   // Página inicial
    Route::get('/cursos/{curso}', 'show')->name('cursos.show');                             // Página de detalhes do curso

    // Rotas do Painel de Controle
    Route::middleware('can:modify cursos')->group(function () {
        Route::get('/painel/cursos/criar', 'create')->name('cursos.create');                // Página de criação de cursos
        Route::get('/painel/cursos/{curso}/editar', 'edit')->name('cursos.edit');           // Página de edição do curso

        // Envios de formulário
        Route::post('/cursos', 'store')->name('cursos.store');                              // Guardar recurso
        Route::put('/cursos/{curso}', 'update')->name('cursos.update');                     // Atualizar recurso
        Route::delete('/cursos/{curso}', 'destroy')->name('cursos.destroy');                // Destruir recurso
    });
});

require __DIR__.'/auth.php';
