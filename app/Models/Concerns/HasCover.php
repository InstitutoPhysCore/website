<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Storage;

/*
Resolve imagens (capa/avatar) e anexos enviados pelo Filament (disco "public")
e remove os arquivos quando o registro é excluído.
*/
trait HasCover
{
    // Colunas que guardam caminhos de arquivos no disco público
    protected function fileColumns(): array
    {
        return array_values(array_filter([$this->coverColumn(), $this->hasAttachment() ? 'attachment' : null]));
    }

    protected function coverColumn(): string
    {
        return 'cover_url';
    }

    protected function hasAttachment(): bool
    {
        return false;
    }

    protected static function bootHasCover(): void
    {
        static::deleted(function ($model) {
            foreach ($model->fileColumns() as $column) {
                $path = $model->getRawOriginal($column);
                if ($path && ! str_starts_with($path, 'http')) {
                    Storage::disk('public')->delete($path);
                }
            }
        });
    }

    public static function fileUrl(?string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        return str_starts_with($path, 'http') ? $path : Storage::disk('public')->url($path);
    }

    // URL da capa, com imagem padrão do site quando não há capa
    public function getCoverSrcAttribute(): string
    {
        return static::fileUrl($this->{$this->coverColumn()}) ?? asset('images/cosmos.webp');
    }

    public function getHasCoverAttribute(): bool
    {
        return filled($this->{$this->coverColumn()});
    }

    public function getAttachmentSrcAttribute(): ?string
    {
        return $this->hasAttachment() ? static::fileUrl($this->attachment) : null;
    }
}
