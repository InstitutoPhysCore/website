<?php

namespace App\Filament\Forms;

use App\Models\Author\Author;
use App\Models\Equipe\Membro;
use App\Models\Equipe\Secretaria;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;

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
                    ->reactive()  // Faz com que o campo reaja à mudança de valor
                    ->afterStateUpdated(function ($set) {
                        $set('author_id', null);
                    }),
                    
                Select::make('author_id')
                    ->label('Selecione o Autor')
                    ->options(function ($get) {
                        $authorType = $get('author_type');

                        // Retorne os tipos de autores de acordo com a author_type
                        switch($authorType) {
                            case 0:
                                return Membro::all()->pluck('name', 'id');
                                break;
                            case 1:
                                return Secretaria::all()->pluck('name', 'id');
                                break;
                            case 2:
                                return Author::all()->pluck('name', 'id');
                                break;
                        };
                    })
                    ->reactive()
                    ->required(),
            ])
        ;
    }
}