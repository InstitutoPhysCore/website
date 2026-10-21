<?php

namespace App\Filament\Resources\Biblioteca\SerieResource\Pages;

use App\Filament\Resources\Biblioteca\SerieResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\ListRecords;

class ListSeries extends ListRecords
{
    protected static string $resource = SerieResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::listActions();
    }
}
