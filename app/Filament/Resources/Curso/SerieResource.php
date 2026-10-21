<?php

namespace App\Filament\Resources\Curso;

use App\Filament\Resources\Curso\SerieResource\Pages;
use App\Filament\Support\Fields;
use App\Filament\Support\ManagedTable;
use App\Filament\Forms\AuthorSection;
use App\Models\Curso\Serie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SerieResource extends Resource
{
    protected static ?string $model = Serie::class;

    protected static ?string $modelLabel = 'série';
    protected static ?string $pluralModelLabel = 'séries';
    protected static ?string $navigationGroup = 'Cursos';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 2;
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fields::title(),
            Fields::desc(),
            Fields::categoria(),
            Fields::cover(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return ManagedTable::make($table, [
            Fields::coverColumn(),
            Tables\Columns\TextColumn::make('title')->label('Título')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('categoria.name')->label('Categoria')->placeholder('Sem categoria')->sortable(),
            Tables\Columns\TextColumn::make('aulas_count')->counts('aulas')->label('Aulas')->sortable(),
            Fields::dateColumn(),
        ], [
            Tables\Filters\SelectFilter::make('categoria')->label('Categoria')->relationship('categoria', 'name')->preload(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeries::route('/'),
            'create' => Pages\CreateSerie::route('/create'),
            'edit' => Pages\EditSerie::route('/{record}/edit'),
        ];
    }
}
