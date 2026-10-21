<?php

namespace App\Filament\Resources\Biblioteca;

use App\Filament\Resources\Biblioteca\LivroResource\Pages;
use App\Filament\Support\Fields;
use App\Filament\Support\ManagedTable;
use App\Filament\Forms\AuthorSection;
use App\Models\Biblioteca\Livro;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LivroResource extends Resource
{
    protected static ?string $model = Livro::class;

    protected static ?string $modelLabel = 'livro';
    protected static ?string $pluralModelLabel = 'livros';
    protected static ?string $navigationGroup = 'Biblioteca';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?int $navigationSort = 1;
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fields::title(),
            Fields::desc(),
            AuthorSection::make()->columnSpanFull(),
            Forms\Components\Select::make('serie_id')
                ->label('Série')
                ->relationship(name: 'serie', titleAttribute: 'title')
                ->searchable()
                ->preload()
                ->placeholder('Sem série')
                ->createOptionForm([
                    Forms\Components\TextInput::make('title')->label('Título da Série')->required()->maxLength(255),
                    Forms\Components\Textarea::make('desc')->label('Descrição da Série')->required()->maxLength(255),
                    Forms\Components\Select::make('categoria_id')->label('Categoria')->relationship('categoria', 'name')->preload(),
                ]),
            Forms\Components\TextInput::make('volume')->label('Volume')->numeric()->minValue(1),
            Fields::pdf('biblioteca'),
            Fields::cover(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return ManagedTable::make($table, [
            Fields::coverColumn(),
            Tables\Columns\TextColumn::make('title')->label('Título')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('serie.title')->label('Série')->placeholder('Sem série'),
            Tables\Columns\TextColumn::make('serie.categoria.name')->label('Categoria')->placeholder('Sem categoria'),
            Tables\Columns\TextColumn::make('volume')->label('Volume')->sortable(),
            Tables\Columns\TextColumn::make('author_name')->label('Autor'),
            Fields::dateColumn(),
        ], [
            Tables\Filters\SelectFilter::make('serie_id')->label('Série')->relationship('serie', 'title')->preload(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLivros::route('/'),
            'create' => Pages\CreateLivro::route('/create'),
            'edit' => Pages\EditLivro::route('/{record}/edit'),
        ];
    }
}
