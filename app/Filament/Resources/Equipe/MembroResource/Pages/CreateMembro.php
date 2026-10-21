<?php

namespace App\Filament\Resources\Equipe\MembroResource\Pages;

use App\Filament\Resources\Equipe\MembroResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMembro extends CreateRecord
{
    protected static string $resource = MembroResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
