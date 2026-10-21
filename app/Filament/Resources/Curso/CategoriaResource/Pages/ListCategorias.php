<?php

namespace App\Filament\Resources\Curso\CategoriaResource\Pages;

use App\Filament\Resources\Curso\CategoriaResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\ListRecords;

class ListCategorias extends ListRecords
{
    protected static string $resource = CategoriaResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::listActions();
    }
}
