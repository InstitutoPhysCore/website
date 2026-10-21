<?php

namespace App\Filament\Resources\Equipe\SecretariaResource\Pages;

use App\Filament\Resources\Equipe\SecretariaResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\EditRecord;

class EditSecretaria extends EditRecord
{
    protected static string $resource = SecretariaResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::editActions();
    }
}
