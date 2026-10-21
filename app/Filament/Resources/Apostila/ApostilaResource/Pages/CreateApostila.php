<?php

namespace App\Filament\Resources\Apostila\ApostilaResource\Pages;

use App\Filament\Resources\Apostila\ApostilaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateApostila extends CreateRecord
{
    protected static string $resource = ApostilaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
