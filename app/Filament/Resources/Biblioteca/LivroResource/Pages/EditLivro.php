<?php

namespace App\Filament\Resources\Biblioteca\LivroResource\Pages;

use App\Filament\Resources\Biblioteca\LivroResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\EditRecord;

class EditLivro extends EditRecord
{
    protected static string $resource = LivroResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::editActions();
    }
}
