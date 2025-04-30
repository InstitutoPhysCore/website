<?php

namespace App\Filament\Resources\Biblioteca\CategoriaResource\Pages;

use App\Filament\Resources\Biblioteca\CategoriaResource;
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
