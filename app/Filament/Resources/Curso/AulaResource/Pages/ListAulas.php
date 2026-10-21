<?php

namespace App\Filament\Resources\Curso\AulaResource\Pages;

use App\Filament\Resources\Curso\AulaResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\ListRecords;

class ListAulas extends ListRecords
{
    protected static string $resource = AulaResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::listActions();
    }
}
