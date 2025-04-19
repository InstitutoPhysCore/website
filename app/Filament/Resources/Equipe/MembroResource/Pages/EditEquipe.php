<?php

namespace App\Filament\Resources\Equipe\MembroResource\Pages;

use App\Filament\Resources\Equipe\MembroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEquipe extends EditRecord
{
    protected static string $resource = MembroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
