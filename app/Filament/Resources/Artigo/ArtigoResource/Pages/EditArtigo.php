<?php

namespace App\Filament\Resources\Artigo\ArtigoResource\Pages;

use App\Filament\Resources\Artigo\ArtigoResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\EditRecord;

class EditArtigo extends EditRecord
{
    protected static string $resource = ArtigoResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::editActions();
    }
}
