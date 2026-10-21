<?php

namespace App\Models\Apostila;

use App\Models\Concerns\HasCover;
use App\Models\Concerns\ProtectsOnDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Serie extends Model
{
    use HasCover, ProtectsOnDelete;

    // Especificar tabela para o recurso
    protected $table = "apostila_series";

    protected $guarded = [];

    protected array $restrictDelete = ['apostilas' => 'apostila(s)'];

    public function apostilas(): HasMany
    {
        return $this->hasMany(Apostila::class);
    }

    /*
    Retorna a categoria da série
    ['name', 'desc']
    */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function deleteLabel(): string
    {
        return $this->title;
    }
}
