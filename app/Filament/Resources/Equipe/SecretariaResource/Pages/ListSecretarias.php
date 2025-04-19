<?php

namespace App\Filament\Resources\Equipe\SecretariaResource\Pages;

use App\Filament\Resources\Equipe\SecretariaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSecretarias extends ListRecords
{
    protected static string $resource = SecretariaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
