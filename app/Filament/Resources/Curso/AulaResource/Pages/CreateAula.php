<?php

namespace App\Filament\Resources\Curso\AulaResource\Pages;

use App\Filament\Resources\Curso\AulaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAula extends CreateRecord
{
    protected static string $resource = AulaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
