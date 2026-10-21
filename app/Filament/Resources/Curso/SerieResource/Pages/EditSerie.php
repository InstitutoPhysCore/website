<?php

namespace App\Filament\Resources\Curso\SerieResource\Pages;

use App\Filament\Resources\Curso\SerieResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\EditRecord;

class EditSerie extends EditRecord
{
    protected static string $resource = SerieResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::editActions();
    }
}
