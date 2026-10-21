<?php

namespace App\Filament\Support;

use Filament\Tables;
use Filament\Tables\Table;

// Ações, ordenação e estados padrão das tabelas administrativas
class ManagedTable
{
    public static function make(Table $table, array $columns, array $filters = []): Table
    {
        return $table
            ->columns($columns)
            ->filters($filters)
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                SafeDelete::row(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    SafeDelete::bulk(),
                ]),
            ])
            ->emptyStateHeading('Nenhum registro encontrado')
            ->emptyStateDescription('Use o botão "Criar" para adicionar o primeiro registro.');
    }
}
