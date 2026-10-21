<?php

namespace App\Filament\Resources\Noticia;

use App\Filament\Resources\Noticia\NoticiaResource\Pages;
use App\Filament\Support\Fields;
use App\Filament\Support\ManagedTable;
use App\Filament\Forms\AuthorSection;
use App\Models\Noticia\Noticia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NoticiaResource extends Resource
{
    protected static ?string $model = Noticia::class;

    protected static ?string $modelLabel = 'notícia';
    protected static ?string $pluralModelLabel = 'notícias';
    protected static ?string $navigationGroup = 'Notícias';
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?int $navigationSort = 1;
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fields::title(),
            Fields::desc(),
            AuthorSection::make()->columnSpanFull(),
            Forms\Components\TextInput::make('priority')
                ->label('Prioridade')
                ->helperText('Notícias com maior prioridade aparecem em destaque na página inicial.')
                ->numeric()
                ->default(0)
                ->minValue(0)
                ->required(),
            Fields::cover(),
            Forms\Components\MarkdownEditor::make('content')->label('Conteúdo')->required()->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return ManagedTable::make($table, [
            Fields::coverColumn(),
            Tables\Columns\TextColumn::make('title')->label('Título')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('priority')->label('Prioridade')->sortable(),
            Tables\Columns\TextColumn::make('author_name')->label('Autor'),
            Fields::dateColumn()->toggleable(isToggledHiddenByDefault: false),
        ], [

        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNoticias::route('/'),
            'create' => Pages\CreateNoticia::route('/create'),
            'edit' => Pages\EditNoticia::route('/{record}/edit'),
        ];
    }
}
