<?php

namespace App\Filament\Resources\Equipe;

use App\Filament\Resources\Equipe\MembroResource\Pages;
use App\Filament\Support\Fields;
use App\Filament\Support\ManagedTable;
use App\Filament\Forms\AuthorSection;
use App\Models\Equipe\Membro;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MembroResource extends Resource
{
    protected static ?string $model = Membro::class;

    protected static ?string $modelLabel = 'membro';
    protected static ?string $pluralModelLabel = 'membros';
    protected static ?string $navigationGroup = 'Equipe';
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?int $navigationSort = 1;
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fields::title('name', 'Nome'),
            Forms\Components\Select::make('secretaria_id')->label('Secretaria')->relationship('secretaria', 'name')->searchable()->preload()->required(),
            Forms\Components\TextInput::make('function')->label('Função')->required()->maxLength(255),
            Forms\Components\Select::make('user_id')->label('Usuário do site (opcional)')->relationship('user', 'name')->searchable()->preload()->placeholder('Sem usuário'),
            Forms\Components\Textarea::make('bio')->label('Biografia')->required()->maxLength(5000)->rows(3)->columnSpanFull(),
            Forms\Components\MarkdownEditor::make('about')->label('Sobre')->columnSpanFull(),
            Fields::cover('avatar_url', 'Foto', 'membros'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return ManagedTable::make($table, [
            Fields::coverColumn('avatar_url')->circular(),
            Tables\Columns\TextColumn::make('name')->label('Nome')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('function')->label('Função')->searchable(),
            Tables\Columns\TextColumn::make('secretaria.name')->label('Secretaria')->sortable(),
            Fields::dateColumn(),
        ], [
            Tables\Filters\SelectFilter::make('secretaria_id')->label('Secretaria')->relationship('secretaria', 'name')->preload(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembros::route('/'),
            'create' => Pages\CreateMembro::route('/create'),
            'edit' => Pages\EditMembro::route('/{record}/edit'),
        ];
    }
}
