<?php

namespace App\Filament\Resources\Noticia\NoticiaResource\Pages;

use App\Filament\Resources\Noticia\NoticiaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNoticia extends EditRecord
{
    protected static string $resource = NoticiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
