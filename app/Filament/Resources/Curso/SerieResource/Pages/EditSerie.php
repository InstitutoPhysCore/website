<?php

namespace App\Filament\Resources\Curso\SerieResource\Pages;

use App\Filament\Resources\Curso\SerieResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSerie extends EditRecord
{
    protected static string $resource = SerieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
