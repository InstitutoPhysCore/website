<?php

namespace App\Filament\Resources\Equipe;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Equipe\Membro;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Equipe\MembroResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Equipe\MembroResource\RelationManagers;

class MembroResource extends Resource
{
    protected static ?string $model = Membro::class;

    public static ?string $label = 'membro';

    public static array $socials;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Equipe';

    

    public static function form(Form $form): Form
    {
        session_start();
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                Forms\Components\Select::make('secretaria_id')
                    ->relationship('secretaria', 'name')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->searchable()
                    ->preload()
                    ->label('Usuário')
                    ->relationship('user', 'name')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required(),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->required(),
                    ])
                    ->required(),
                Forms\Components\TextInput::make('function')
                    ->label('Função')
                    ->required(),
                Forms\Components\Textarea::make('bio')
                    ->label('Biografia')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('about')
                    ->label('Sobre')
                    ->required()
                    ->columnSpanFull(),
                /*
                Forms\Components\Select::make('badges')
                    ->label('Badges')
                    ->multiple()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                    ])
                    ->required(),
                */
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('secretaria.name')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('function')
                    ->label('Função'),
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
            'index' => Pages\ListEquipes::route('/'),
            'create' => Pages\CreateEquipe::route('/create'),
            'edit' => Pages\EditEquipe::route('/{record}/edit'),
        ];
    }
}
