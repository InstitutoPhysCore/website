<?php

namespace App\Filament\Resources\Artigo\ArtigoResource\Pages;

use App\Filament\Resources\Artigo\ArtigoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArtigo extends EditRecord
{
    protected static string $resource = ArtigoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
