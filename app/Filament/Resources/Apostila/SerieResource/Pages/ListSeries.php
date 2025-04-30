<?php

namespace App\Filament\Resources\Apostila\SerieResource\Pages;

use App\Filament\Resources\Apostila\SerieResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeries extends ListRecords
{
    protected static string $resource = SerieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
