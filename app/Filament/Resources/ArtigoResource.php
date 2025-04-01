<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Artigo\Artigo;
use App\Models\Equipe\Membro;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ArtigoResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ArtigoResource\RelationManagers;
use App\Models\Author\Author;
use App\Models\Equipe\Secretaria;

class ArtigoResource extends Resource
{
    protected static ?string $model = Artigo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Recursos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Título')
                    ->required(),
                Forms\Components\Select::make('author_type')
                    ->label('Tipo do Autor')
                    ->options([
                        0 => 'Membro',
                        1 => 'Secretaria',
                        2 => 'Autor externo'
                    ])
                    ->reactive()  // Faz com que o campo reaja à mudança de valor
                    ->afterStateUpdated(function ($set) {
                        $set('author_id', null);
                    }),
                Forms\Components\Select::make('author_id')
                    ->label('Selecione o Autor')
                    ->options(function ($get) {
                        $authorType = $get('author_type');

                        switch($authorType) {
                            case 0:
                                return Membro::all()->pluck('name', 'id');
                                break;
                            case 1:
                                return Secretaria::all()->pluck('name', 'id');
                                break;
                            case 2:
                                return Author::all()->pluck('name', 'id');
                                break;
                        };
                    })
                    ->reactive()
                    ->required(),
                Forms\Components\Placeholder::make('actions')
                    ->label('')
                    ->content(function (Closure $get) {
                        $tipoAutor = $get('tipo_autor');
                        if ($tipoAutor === 0 || $tipoAutor === 1) {
                            return Button::make('Criar Novo')
                                ->url(route('membros.create')) // Para Membros
                                ->label('Criar Novo Membro')
                                ->icon('heroicon-s-plus');
                        }
                        return null; // Não mostra o botão para Autor Externo
                    }),
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
                    ->label('Titulo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc')
                    ->label('Descrição')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author')
                    ->sortable(),
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
