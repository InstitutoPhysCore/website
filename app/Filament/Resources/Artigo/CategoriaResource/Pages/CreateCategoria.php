<?php

namespace App\Filament\Resources\Artigo\CategoriaResource\Pages;

use App\Filament\Resources\Artigo\CategoriaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategoria extends CreateRecord
{
    protected static string $resource = CategoriaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
