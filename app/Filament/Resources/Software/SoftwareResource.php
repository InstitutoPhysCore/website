<?php

namespace App\Filament\Resources\Software;

use App\Filament\Resources\Software\SoftwareResource\Pages;
use App\Filament\Support\Fields;
use App\Filament\Support\ManagedTable;
use App\Filament\Forms\AuthorSection;
use App\Models\Software\Software;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SoftwareResource extends Resource
{
    protected static ?string $model = Software::class;

    protected static ?string $modelLabel = 'software';
    protected static ?string $pluralModelLabel = 'softwares';
    protected static ?string $navigationGroup = 'Softwares';
    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';
    protected static ?int $navigationSort = 1;
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fields::title('name', 'Nome'),
            Fields::desc(),
            AuthorSection::make()->columnSpanFull(),
            Fields::categoria(),
            Forms\Components\TextInput::make('owner')->label('Dono do repositório (GitHub)')->required()->maxLength(255)->alphaDash(),
            Forms\Components\TextInput::make('repo')->label('Nome do repositório (GitHub)')->required()->maxLength(255)->regex('/^[\w.\-]+$/'),
            Fields::cover(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return ManagedTable::make($table, [
            Fields::coverColumn(),
            Tables\Columns\TextColumn::make('name')->label('Nome')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('categoria.name')->label('Categoria')->placeholder('Sem categoria')->sortable(),
            Tables\Columns\TextColumn::make('repo_url')->label('Repositório')->url(fn ($record) => $record->repo_url, true)->limit(40),
            Tables\Columns\TextColumn::make('author_name')->label('Autor'),
            Fields::dateColumn(),
        ], [
            Tables\Filters\SelectFilter::make('categoria')->label('Categoria')->relationship('categoria', 'name')->preload(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSoftware::route('/'),
            'create' => Pages\CreateSoftware::route('/create'),
            'edit' => Pages\EditSoftware::route('/{record}/edit'),
        ];
    }
}
