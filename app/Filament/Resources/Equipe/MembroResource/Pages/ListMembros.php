<?php

namespace App\Filament\Resources\Equipe\MembroResource\Pages;

use App\Filament\Resources\Equipe\MembroResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\ListRecords;

class ListMembros extends ListRecords
{
    protected static string $resource = MembroResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::listActions();
    }
}
