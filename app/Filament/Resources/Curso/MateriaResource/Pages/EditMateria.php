<?php

namespace App\Filament\Resources\Curso\MateriaResource\Pages;

use App\Filament\Resources\Curso\MateriaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMateria extends EditRecord
{
    protected static string $resource = MateriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
