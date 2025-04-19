<?php

namespace App\Filament\Resources\Curso\SerieResource\Pages;

use App\Filament\Resources\Curso\SerieResource;
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
