<?php

namespace App\Filament\Resources\Apostila;

use App\Filament\Resources\Apostila\ApostilaResource\Pages;
use App\Filament\Support\Fields;
use App\Filament\Support\ManagedTable;
use App\Filament\Forms\AuthorSection;
use App\Models\Apostila\Apostila;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ApostilaResource extends Resource
{
    protected static ?string $model = Apostila::class;

    protected static ?string $modelLabel = 'apostila';
    protected static ?string $pluralModelLabel = 'apostilas';
    protected static ?string $navigationGroup = 'Apostilas';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
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
            Fields::pdf('apostilas'),
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
            'index' => Pages\ListApostilas::route('/'),
            'create' => Pages\CreateApostila::route('/create'),
            'edit' => Pages\EditApostila::route('/{record}/edit'),
        ];
    }
}
