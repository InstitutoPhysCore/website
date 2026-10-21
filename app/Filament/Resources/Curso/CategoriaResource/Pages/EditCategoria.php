<?php

namespace App\Filament\Resources\Curso\CategoriaResource\Pages;

use App\Filament\Resources\Curso\CategoriaResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\EditRecord;

class EditCategoria extends EditRecord
{
    protected static string $resource = CategoriaResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::editActions();
    }
}
