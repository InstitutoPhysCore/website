<?php

namespace App\Filament\Resources\ApostilaResource\Pages;

use App\Filament\Resources\ApostilaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApostila extends EditRecord
{
    protected static string $resource = ApostilaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
