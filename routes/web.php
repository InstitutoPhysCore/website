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

});

// Rotas dos Artigos
Route::controller(ArtigoController::class)->group(function () {

    // Requisições de Página
    Route::get('/artigos', 'index')->name('artigos.index');                                 // Página inicial
    Route::get('/artigos/{artigo}', 'show')->name('artigos.show');                          // Página de detalhes do artigo

});

// Rotas das Noticias
Route::controller(NoticiaController::class)->group(function () {

    // Requisições de Página
    Route::get('/noticias', 'index')->name('noticias.index');                               // Página inicial
    Route::get('/noticias/{noticia}', 'show')->name('noticias.show');                       // Página de detalhes da noticia

});

// Rotas das Softwares
Route::controller(SoftwareController::class)->group(function () {

    // Requisições de Página
    Route::get('/softwares', 'index')->name('softwares.index')->middleware('auth');                             // Página inicial
    Route::get('/softwares/{software}', 'show')->name('softwares.show');                    // Página de detalhes da software

});

// Rotas das Apostilas
Route::controller(ApostilaController::class)->group(function () {

    // Requisições de Página
    Route::get('/apostilas', 'index')->name('apostilas.index');                             // Página inicial
    Route::get('/apostilas/{apostila}', 'show')->name('apostilas.show');                    // Página de detalhes da apostila

});

// Rotas da Biblioteca
Route::controller(BibliotecaController::class)->group(function () {

    // Requisições de Página
    Route::get('/biblioteca', 'index')->name('biblioteca.index');                           // Página inicial
    Route::get('/biblioteca/{livro}', 'show')->name('biblioteca.show');                     // Página de detalhes da biblioteca

});

// Rotas dos Cursos
Route::controller(CursoController::class)->group(function () {

    // Requisições de Página
    Route::get('/cursos', 'index')->name('cursos.index');                                   // Página inicial
    Route::get('/cursos/{curso}', 'show')->name('cursos.show');                             // Página de detalhes do curso

});

require __DIR__.'/auth.php';
