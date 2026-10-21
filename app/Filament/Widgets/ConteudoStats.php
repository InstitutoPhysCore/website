<?php

namespace App\Filament\Widgets;

use App\Models\Apostila\Apostila;
use App\Models\Artigo\Artigo;
use App\Models\Biblioteca\Livro;
use App\Models\Curso\Serie;
use App\Models\Noticia\Noticia;
use App\Models\Software\Software;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ConteudoStats extends StatsOverviewWidget
{
    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make('Notícias', Noticia::count()),
            Stat::make('Artigos', Artigo::count()),
            Stat::make('Cursos (séries)', Serie::count()),
            Stat::make('Apostilas', Apostila::count()),
            Stat::make('Livros', Livro::count()),
            Stat::make('Softwares', Software::count()),
        ];
    }
}
