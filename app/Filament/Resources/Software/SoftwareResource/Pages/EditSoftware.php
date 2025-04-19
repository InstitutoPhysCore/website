<?php

namespace App\Filament\Resources\Software\SoftwareResource\Pages;

use App\Filament\Resources\Software\SoftwareResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSoftware extends EditRecord
{
    protected static string $resource = SoftwareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
