<?php

namespace App\Models\Apostila;

use App\Models\Apostila\Apostila;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Serie extends Model
{
    // Especificar tabela para o recurso
    protected $table = "apostila_series";

    protected $guarded = '';

    public function apostilas(): HasMany
    {
        return $this->hasMany(Apostila::class);
    }

    /* 
    Retorna a materia da série
    ['name', 'desc']
    */
    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class);
    }
}
