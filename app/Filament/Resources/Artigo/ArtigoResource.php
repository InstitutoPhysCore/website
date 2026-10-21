<?php

namespace App\Filament\Resources\Artigo;

use App\Filament\Resources\Artigo\ArtigoResource\Pages;
use App\Filament\Support\Fields;
use App\Filament\Support\ManagedTable;
use App\Filament\Forms\AuthorSection;
use App\Models\Artigo\Artigo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ArtigoResource extends Resource
{
    protected static ?string $model = Artigo::class;

    protected static ?string $modelLabel = 'artigo';
    protected static ?string $pluralModelLabel = 'artigos';
    protected static ?string $navigationGroup = 'Artigos';
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?int $navigationSort = 1;
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fields::title(),
            Fields::desc(),
            AuthorSection::make()->columnSpanFull(),
            Fields::categoria(),
            Fields::cover(),
            Forms\Components\MarkdownEditor::make('content')->label('Conteúdo')->required()->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return ManagedTable::make($table, [
            Fields::coverColumn(),
            Tables\Columns\TextColumn::make('title')->label('Título')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('categoria.name')->label('Categoria')->placeholder('Sem categoria')->sortable(),
            Tables\Columns\TextColumn::make('author_name')->label('Autor'),
            Fields::dateColumn(),
        ], [
            Tables\Filters\SelectFilter::make('categoria')->label('Categoria')->relationship('categoria', 'name')->preload(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArtigos::route('/'),
            'create' => Pages\CreateArtigo::route('/create'),
            'edit' => Pages\EditArtigo::route('/{record}/edit'),
        ];
    }
}
