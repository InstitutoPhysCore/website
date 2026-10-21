<?php

namespace App\Filament\Resources\Curso;

use App\Filament\Resources\Curso\AulaResource\Pages;
use App\Filament\Support\Fields;
use App\Filament\Support\ManagedTable;
use App\Filament\Forms\AuthorSection;
use App\Models\Curso\Aula;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AulaResource extends Resource
{
    protected static ?string $model = Aula::class;

    protected static ?string $modelLabel = 'aula';
    protected static ?string $pluralModelLabel = 'aulas';
    protected static ?string $navigationGroup = 'Cursos';
    protected static ?string $navigationIcon = 'heroicon-o-play-circle';
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
                ->required()
                ->createOptionForm([
                    Forms\Components\TextInput::make('title')->label('Título da Série')->required()->maxLength(255),
                    Forms\Components\Textarea::make('desc')->label('Descrição da Série')->required()->maxLength(255),
                    Forms\Components\Select::make('categoria_id')->label('Categoria')->relationship('categoria', 'name')->preload(),
                ]),
            Forms\Components\TextInput::make('episode')->label('Episódio')->numeric()->minValue(1)->required(),
            Forms\Components\TextInput::make('attachment')
                ->label('Link do vídeo (YouTube)')
                ->url()
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),
            Fields::cover(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return ManagedTable::make($table, [
            Fields::coverColumn(),
            Tables\Columns\TextColumn::make('title')->label('Título')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('serie.title')->label('Série')->searchable()->placeholder('Sem série'),
            Tables\Columns\TextColumn::make('episode')->label('Episódio')->sortable(),
            Tables\Columns\TextColumn::make('author_name')->label('Autor'),
            Fields::dateColumn(),
        ], [
            Tables\Filters\SelectFilter::make('serie_id')->label('Série')->relationship('serie', 'title')->preload(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAulas::route('/'),
            'create' => Pages\CreateAula::route('/create'),
            'edit' => Pages\EditAula::route('/{record}/edit'),
        ];
    }
}
