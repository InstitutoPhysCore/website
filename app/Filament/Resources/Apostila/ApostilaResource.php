<?php

namespace App\Filament\Resources\Apostila;

use App\Filament\Forms\AuthorSection;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\Apostila\Apostila;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Apostila\ApostilaResource\Pages;
use App\Filament\Resources\Apostila\ApostilaResource\RelationManagers;

class ApostilaResource extends Resource
{
    protected static ?string $model = Apostila::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Apostilas';

    protected static ?string $slug = 'apostilas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\TextInput::make('desc')
                    ->label('Descrição')
                    ->columnSpanFull()
                    ->required(),

                AuthorSection::make(),

                Forms\Components\Select::make('serie_id')
                    ->label('Série')
                    ->relationship(name: 'serie', titleAttribute: 'title')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('title')
                            ->label('Título da Série')
                            ->required(),
                        Forms\Components\TextInput::make('desc')
                            ->label('Descrição da Série')
                            ->required(),
                        Forms\Components\Select::make('categoria_id')
                            ->label('Categoria da Série')
                            ->relationship(name: 'categoria', titleAttribute: 'name')
                            ->required(),
                    ])
                    ->required(),

                Forms\Components\TextInput::make('volume')
                    ->label('Volume')
                    ->numeric()
                    ->required(),

                Forms\Components\FileUpload::make('attachment')
                    ->label('PDF do Livro')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc')
                    ->label('Descrição'),
                Tables\Columns\TextColumn::make('author.name')
                    ->label('Autor'),
                Tables\Columns\TextColumn::make('serie.title')
                    ->label('Série')
                    ->searchable(),
                Tables\Columns\TextColumn::make('volume')
                    ->label('Volume da Série'),
                Tables\Columns\TextColumn::make('categoria.name')
                    ->label('Categoria'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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
