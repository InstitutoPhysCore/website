<?php

namespace App\Filament\Resources\Author\AuthorResource\Pages;

use App\Filament\Resources\Author\AuthorResource;
use App\Filament\Support\Pages;
use Filament\Resources\Pages\ListRecords;

class ListAuthors extends ListRecords
{
    protected static string $resource = AuthorResource::class;

    protected function getHeaderActions(): array
    {
        return Pages::listActions();
    }
}
