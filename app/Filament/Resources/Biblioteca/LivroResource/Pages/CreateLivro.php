<?php

namespace App\Filament\Resources\Biblioteca\LivroResource\Pages;

use App\Filament\Resources\Biblioteca\LivroResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLivro extends CreateRecord
{
    protected static string $resource = LivroResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
