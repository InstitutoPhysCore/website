<?php

namespace App\Filament\Support;

use Filament\Actions;

// Cabeçalhos padrão das páginas dos recursos
class Pages
{
    public static function listActions(): array
    {
        return [Actions\CreateAction::make()];
    }

    public static function editActions(): array
    {
        return [SafeDelete::page()];
    }
}
