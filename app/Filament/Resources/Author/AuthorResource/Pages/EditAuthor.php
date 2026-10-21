<?php

namespace App\Filament\Resources\Author\AuthorResource\Pages;

use App\Filament\Resources\Author\AuthorResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\EditRecord;

class EditAuthor extends EditRecord
{
    protected static string $resource = AuthorResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::editActions();
    }
}
