<?php

namespace App\Filament\Resources\Apostila\SerieResource\Pages;

use App\Filament\Resources\Apostila\SerieResource;
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
