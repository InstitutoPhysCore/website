<?php

namespace App\Models\Concerns;

use RuntimeException;

/*
Define o que acontece com registros relacionados quando o modelo é excluído.

  $restrictDelete  = ['relacao' => 'descrição'];  impede a exclusão enquanto houver registros
  $nullifyOnDelete = ['relacao'];                 registros relacionados ficam sem vínculo (FK = null)

Os dois mecanismos valem para qualquer caminho de exclusão (Filament, tinker, código).
*/
trait ProtectsOnDelete
{
    protected static function bootProtectsOnDelete(): void
    {
        static::deleting(function ($model) {
            if ($blockers = $model->deleteBlockers()) {
                throw new RuntimeException(implode(' ', $blockers));
            }

            foreach ($model->nullifyOnDelete ?? [] as $relation) {
                $rel = $model->{$relation}();
                $rel->update([$rel->getForeignKeyName() => null]);
            }
        });
    }

    // Motivos (em português) pelos quais o registro não pode ser excluído agora
    public function deleteBlockers(): array
    {
        $reasons = [];

        foreach ($this->restrictDelete ?? [] as $relation => $label) {
            $count = $this->{$relation}()->count();
            if ($count > 0) {
                $reasons[] = "Há {$count} {$label} vinculado(s) a \"{$this->deleteLabel()}\".";
            }
        }

        return array_merge($reasons, $this->extraDeleteBlockers());
    }

    protected function extraDeleteBlockers(): array
    {
        return [];
    }

    public function deleteLabel(): string
    {
        return (string) ($this->name ?? $this->title ?? $this->getKey());
    }

    // Quantos registros ficarão sem vínculo ao excluir (para avisar na confirmação)
    public function nullifyCount(): int
    {
        return collect($this->nullifyOnDelete ?? [])->sum(fn ($relation) => $this->{$relation}()->count());
    }
}
