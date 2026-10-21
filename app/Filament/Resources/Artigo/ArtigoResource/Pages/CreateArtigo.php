<?php

namespace App\Filament\Resources\Artigo\ArtigoResource\Pages;

use App\Filament\Resources\Artigo\ArtigoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateArtigo extends CreateRecord
{
    protected static string $resource = ArtigoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
