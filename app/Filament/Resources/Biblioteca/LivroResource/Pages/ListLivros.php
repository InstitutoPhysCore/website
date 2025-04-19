<?php

namespace App\Filament\Resources\Biblioteca\LivroResource\Pages;

use App\Filament\Resources\Biblioteca\LivroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLivros extends ListRecords
{
    protected static string $resource = LivroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
