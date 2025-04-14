<?php

namespace App\Filament\Resources\Apostila\ApostilaResource\Pages;

use App\Filament\Resources\Apostila\ApostilaResource;
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
