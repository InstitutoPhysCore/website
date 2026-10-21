<?php

namespace App\Filament\Resources\Author;

use App\Filament\Resources\Author\AuthorResource\Pages;
use App\Filament\Support\Fields;
use App\Filament\Support\ManagedTable;
use App\Filament\Forms\AuthorSection;
use App\Models\Author\Author;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $modelLabel = 'autor externo';
    protected static ?string $pluralModelLabel = 'autores externos';
    protected static ?string $navigationGroup = 'Site';
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?int $navigationSort = 2;
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fields::title('name', 'Nome'),
            Forms\Components\TextInput::make('link')->label('Link do autor')->url()->required()->maxLength(255)->columnSpanFull(),
            Fields::cover('cover_url', 'Foto'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return ManagedTable::make($table, [
            Fields::coverColumn(),
            Tables\Columns\TextColumn::make('name')->label('Nome')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('link')->label('Link')->limit(40),
            Fields::dateColumn(),
        ], [

        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthor::route('/create'),
            'edit' => Pages\EditAuthor::route('/{record}/edit'),
        ];
    }
}
