<?php

namespace App\Filament\Resources\Software\SoftwareResource\Pages;

use App\Filament\Resources\Software\SoftwareResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSoftware extends CreateRecord
{
    protected static string $resource = SoftwareResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
