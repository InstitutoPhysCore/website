<?php

namespace App\Filament\Resources\Noticia;

use App\Filament\Forms\AuthorSection;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Author\Author;
use App\Models\Equipe\Membro;
use App\Models\Noticia\Noticia;
use Filament\Resources\Resource;
use App\Models\Equipe\Secretaria;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Noticia\NoticiaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Noticia\NoticiaResource\RelationManagers;

class NoticiaResource extends Resource
{
    protected static ?string $model = Noticia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Outros';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->required(),

                Forms\Components\FileUpload::make('cover')
                    ->image(),

                Forms\Components\TextInput::make('priority')
                    ->label('Prioridade')
                    ->numeric()
                    ->required(),

                AuthorSection::make(),

                Forms\Components\TextInput::make('desc')
                    ->label('Descrição')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\MarkdownEditor::make('content')
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Nome')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc')
                    ->label('Descrição')
                    ->searchable(),
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
            'index' => Pages\ListNoticias::route('/'),
            'create' => Pages\CreateNoticia::route('/create'),
            'edit' => Pages\EditNoticia::route('/{record}/edit'),
        ];
    }
}
