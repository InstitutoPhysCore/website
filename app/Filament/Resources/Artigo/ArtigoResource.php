<?php

namespace App\Filament\Resources\Artigo;

use Closure;
use AuthorSection;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Forms\Components\Button;
use App\Models\Artigo\Artigo;
use App\Models\Author\Author;
use App\Models\Equipe\Membro;
use Filament\Resources\Resource;
use App\Models\Equipe\Secretaria;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Artigo\ArtigoResource\Pages;
use App\Filament\Resources\Artigo\ArtigoResource\RelationManagers;

class ArtigoResource extends Resource
{
    protected static ?string $model = Artigo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Artigo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->required(),                
                Forms\Components\TextInput::make('desc')
                    ->label('Descrição')
                    ->columnSpanFull()
                    ->required(),

                AuthorSection::make(),

                Forms\Components\MarkdownEditor::make('content')
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Titulo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc')
                    ->label('Descrição')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListArtigos::route('/'),
            'create' => Pages\CreateArtigo::route('/create'),
            'edit' => Pages\EditArtigo::route('/{record}/edit'),
        ];
    }
}
