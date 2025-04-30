<?php

namespace App\Filament\Resources\Apostila\MateriaResource\Pages;

use App\Filament\Resources\Apostila\MateriaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaterias extends ListRecords
{
    protected static string $resource = MateriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
