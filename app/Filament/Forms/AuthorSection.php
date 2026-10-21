<?php

namespace App\Filament\Forms;

use App\Models\Author\Author;
use App\Models\Equipe\Membro;
use App\Models\Equipe\Secretaria;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;

class AuthorSection {
    public static function make() {
        return
            Section::make('Autoria')->schema([
                Select::make('author_type')
                    ->label('Tipo do Autor')
                    ->options([
                        0 => 'Membro',
                        1 => 'Secretaria',
                        2 => 'Autor externo'
                    ])
                    ->default(0)
                    ->required()
                    ->live()  // Faz com que o campo reaja à mudança de valor
                    ->afterStateUpdated(function ($set) {
                        $set('author_id', null);
                    }),

                Select::make('author_id')
                    ->label('Selecione o Autor')
                    ->searchable()
                    ->options(function ($get) {
                        // Retorne os tipos de autores de acordo com a author_type
                        return match ((int) $get('author_type')) {
                            0 => Membro::orderBy('name')->pluck('name', 'id'),
                            1 => Secretaria::orderBy('name')->pluck('name', 'id'),
                            2 => Author::orderBy('name')->pluck('name', 'id'),
                            default => [],
                        };
                    })
                    ->required(),
            ])->columns(2)
        ;
    }
}
