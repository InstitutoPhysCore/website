<?php

namespace App\Filament\Resources\Curso\AulaResource\Pages;

use App\Filament\Resources\Curso\AulaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAulas extends ListRecords
{
    protected static string $resource = AulaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
