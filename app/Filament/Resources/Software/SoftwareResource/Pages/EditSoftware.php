<?php

namespace App\Filament\Resources\Software\SoftwareResource\Pages;

use App\Filament\Resources\Software\SoftwareResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\EditRecord;

class EditSoftware extends EditRecord
{
    protected static string $resource = SoftwareResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::editActions();
    }
}
