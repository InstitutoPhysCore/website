<?php

namespace App\Filament\Resources\Equipe\SecretariaResource\Pages;

use App\Filament\Resources\Equipe\SecretariaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSecretaria extends CreateRecord
{
    protected static string $resource = SecretariaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
