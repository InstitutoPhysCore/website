<?php

namespace App\Filament\Resources\Noticia\NoticiaResource\Pages;

use App\Filament\Resources\Noticia\NoticiaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNoticia extends CreateRecord
{
    protected static string $resource = NoticiaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
