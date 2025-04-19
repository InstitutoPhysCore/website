<?php

namespace App\Filament\Resources\Biblioteca\CategoriaResource\Pages;

use App\Filament\Resources\Biblioteca\CategoriaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategorias extends ListRecords
{
    protected static string $resource = CategoriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
