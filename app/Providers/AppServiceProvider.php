<?php

namespace App\Providers;

use App\Models;
use App\Policies\AdminPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    // Modelos administrados pelo Filament
    private const MANAGED = [
        Models\Apostila\Apostila::class,
        Models\Apostila\Categoria::class,
        Models\Apostila\Serie::class,
        Models\Artigo\Artigo::class,
        Models\Artigo\Categoria::class,
        Models\Author\Author::class,
        Models\Biblioteca\Categoria::class,
        Models\Biblioteca\Livro::class,
        Models\Biblioteca\Serie::class,
        Models\Curso\Aula::class,
        Models\Curso\Categoria::class,
        Models\Curso\Serie::class,
        Models\Equipe\Membro::class,
        Models\Equipe\Secretaria::class,
        Models\Noticia\Noticia::class,
        Models\Software\Categoria::class,
        Models\Software\Software::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        foreach (self::MANAGED as $model) {
            Gate::policy($model, AdminPolicy::class);
        }

        Gate::policy(Models\User::class, UserPolicy::class);
    }
}
