<?php

namespace App\Filament\Resources\Apostila\ApostilaResource\Pages;

use App\Filament\Resources\Apostila\ApostilaResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\EditRecord;

class EditApostila extends EditRecord
{
    protected static string $resource = ApostilaResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::editActions();
    }
}
