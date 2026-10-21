<?php

namespace App\Filament\Resources\Apostila\ApostilaResource\Pages;

use App\Filament\Resources\Apostila\ApostilaResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\ListRecords;

class ListApostilas extends ListRecords
{
    protected static string $resource = ApostilaResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::listActions();
    }
}
