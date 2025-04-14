<?php

namespace App\Filament\Resources\Apostila\ApostilaResource\Pages;

use App\Filament\Resources\Apostila\ApostilaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApostilas extends ListRecords
{
    protected static string $resource = ApostilaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
