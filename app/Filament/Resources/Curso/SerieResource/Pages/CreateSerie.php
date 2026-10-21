<?php

namespace App\Filament\Resources\Curso\SerieResource\Pages;

use App\Filament\Resources\Curso\SerieResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSerie extends CreateRecord
{
    protected static string $resource = SerieResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
