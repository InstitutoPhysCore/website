<?php

namespace App\Filament\Resources\Equipe;

use App\Filament\Resources\Equipe\SecretariaResource\Pages;
use App\Filament\Support\Fields;
use App\Filament\Support\ManagedTable;
use App\Filament\Forms\AuthorSection;
use App\Models\Equipe\Secretaria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SecretariaResource extends Resource
{
    protected static ?string $model = Secretaria::class;

    protected static ?string $modelLabel = 'secretaria';
    protected static ?string $pluralModelLabel = 'secretarias';
    protected static ?string $navigationGroup = 'Equipe';
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?int $navigationSort = 2;
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fields::title('name', 'Nome'),
            Forms\Components\Textarea::make('desc')->label('Descrição')->required()->rows(3)->columnSpanFull(),
            Forms\Components\Select::make('diretor_id')
                ->label('Diretor')
                ->helperText('Disponível após cadastrar membros nesta secretaria.')
                ->placeholder('Sem diretor')
                ->options(fn (?\Illuminate\Database\Eloquent\Model $record) => $record ? $record->membros()->orderBy('name')->pluck('name', 'id') : []),
            Fields::cover('cover_url', 'Imagem'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return ManagedTable::make($table, [
            Fields::coverColumn(),
            Tables\Columns\TextColumn::make('name')->label('Nome')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('diretor.name')->label('Diretor')->placeholder('Sem diretor'),
            Tables\Columns\TextColumn::make('membros_count')->counts('membros')->label('Membros')->sortable(),
            Fields::dateColumn(),
        ], [

        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSecretarias::route('/'),
            'create' => Pages\CreateSecretaria::route('/create'),
            'edit' => Pages\EditSecretaria::route('/{record}/edit'),
        ];
    }
}
