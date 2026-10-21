<?php

namespace App\Filament\Resources\Curso\CategoriaResource\Pages;

use App\Filament\Resources\Curso\CategoriaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategoria extends CreateRecord
{
    protected static string $resource = CategoriaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
