<?php

namespace App\Filament\Resources\Artigo\CategoriaResource\Pages;

use App\Filament\Resources\Artigo\CategoriaResource;
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
