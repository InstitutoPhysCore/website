<?php

namespace App\Filament\Resources\Noticia\NoticiaResource\Pages;

use App\Filament\Resources\Noticia\NoticiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNoticias extends ListRecords
{
    protected static string $resource = NoticiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
