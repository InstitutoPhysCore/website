<?php

namespace App\Filament\Support;

use Filament\Actions\DeleteAction as PageDeleteAction;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Support\Collection;

/*
Ações de exclusão que respeitam $restrictDelete / $nullifyOnDelete dos models
(ProtectsOnDelete): bloqueiam com mensagem clara ou avisam o que ficará sem vínculo.
*/
class SafeDelete
{
    private static function blockers($record): array
    {
        return method_exists($record, 'deleteBlockers') ? $record->deleteBlockers() : [];
    }

    private static function warning($record): string
    {
        $n = method_exists($record, 'nullifyCount') ? $record->nullifyCount() : 0;

        return $n ? "{$n} item(ns) vinculado(s) ficarão sem categoria/vínculo. Deseja continuar?" : 'Esta ação não pode ser desfeita.';
    }

    private static function block(array $reasons): void
    {
        Notification::make()
            ->danger()
            ->title('Não foi possível excluir')
            ->body(implode(' ', $reasons))
            ->persistent()
            ->send();
    }

    public static function row(): DeleteAction
    {
        return DeleteAction::make()
            ->modalDescription(fn ($record) => self::warning($record))
            ->before(function ($record, DeleteAction $action) {
                if ($reasons = self::blockers($record)) {
                    self::block($reasons);
                    $action->cancel();
                }
            })
            ->successNotificationTitle('Registro excluído');
    }

    public static function page(): PageDeleteAction
    {
        return PageDeleteAction::make()
            ->modalDescription(fn ($record) => self::warning($record))
            ->before(function ($record, PageDeleteAction $action) {
                if ($reasons = self::blockers($record)) {
                    self::block($reasons);
                    $action->cancel();
                }
            })
            ->successNotificationTitle('Registro excluído');
    }

    public static function bulk(): DeleteBulkAction
    {
        return DeleteBulkAction::make()
            ->before(function (Collection $records, DeleteBulkAction $action) {
                $reasons = $records->flatMap(fn ($r) => self::blockers($r))->all();
                if ($reasons) {
                    self::block($reasons);
                    $action->cancel();
                }
            })
            ->successNotificationTitle('Registros excluídos');
    }
}
