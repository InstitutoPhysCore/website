<?php

namespace App\Filament\Resources\Equipe\MembroResource\Pages;

use App\Filament\Resources\Equipe\MembroResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\EditRecord;

class EditMembro extends EditRecord
{
    protected static string $resource = MembroResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::editActions();
    }
}
