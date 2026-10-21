<?php

namespace App\Filament\Resources\Biblioteca\CategoriaResource\Pages;

use App\Filament\Resources\Biblioteca\CategoriaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategoria extends CreateRecord
{
    protected static string $resource = CategoriaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
