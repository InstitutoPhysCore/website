<?php

namespace App\Filament\Support;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

// Campos e colunas compartilhados pelos recursos do painel
class Fields
{
    public static function cover(string $column = 'cover_url', string $label = 'Capa', string $directory = 'capas'): FileUpload
    {
        return FileUpload::make($column)
            ->label($label)
            ->image()
            ->imageEditor()
            ->disk('public')
            ->directory($directory)
            ->visibility('public')
            ->maxSize(4096)
            ->columnSpanFull();
    }

    public static function pdf(string $directory): FileUpload
    {
        return FileUpload::make('attachment')
            ->label('Arquivo PDF')
            ->acceptedFileTypes(['application/pdf'])
            ->disk('public')
            ->directory($directory)
            ->visibility('public')
            ->maxSize(51200)
            ->downloadable()
            ->required()
            ->columnSpanFull();
    }

    public static function title(string $name = 'title', string $label = 'Título'): TextInput
    {
        return TextInput::make($name)->label($label)->required()->maxLength(255)->columnSpanFull();
    }

    public static function desc(): Textarea
    {
        return Textarea::make('desc')->label('Descrição')->required()->maxLength(255)->rows(2)->columnSpanFull();
    }

    public static function categoria(string $label = 'Categoria'): Select
    {
        return Select::make('categoria_id')
            ->label($label)
            ->relationship('categoria', 'name')
            ->searchable()
            ->preload()
            ->placeholder('Sem categoria')
            ->createOptionForm([
                TextInput::make('name')->label('Nome')->required()->maxLength(255),
                Textarea::make('desc')->label('Descrição')->required()->maxLength(255),
            ]);
    }

    public static function coverColumn(string $column = 'cover_url'): ImageColumn
    {
        return ImageColumn::make($column)->label('Capa')->disk('public')->square()->defaultImageUrl(asset('images/cosmos.webp'));
    }

    public static function dateColumn(): TextColumn
    {
        return TextColumn::make('created_at')->label('Criado em')->dateTime('d/m/Y H:i')->sortable()->toggleable(isToggledHiddenByDefault: true);
    }
}
