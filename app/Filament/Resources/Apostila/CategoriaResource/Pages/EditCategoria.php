<?php

namespace App\Filament\Resources\Apostila\CategoriaResource\Pages;

use App\Filament\Resources\Apostila\CategoriaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoria extends EditRecord
{
    protected static string $resource = CategoriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
