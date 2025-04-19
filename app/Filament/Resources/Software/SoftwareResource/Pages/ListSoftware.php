<?php

namespace App\Filament\Resources\Software\SoftwareResource\Pages;

use App\Filament\Resources\Software\SoftwareResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSoftware extends ListRecords
{
    protected static string $resource = SoftwareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
