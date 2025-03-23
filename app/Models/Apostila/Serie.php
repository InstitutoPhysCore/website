<?php

namespace App\Models\Apostila;

use App\Models\Apostila;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Serie extends Model
{
    // Especificar tabela para o recurso
    protected $table = "apostilas_series";

    public function apostilas(): HasMany
    {
        return $this->hasMany(Apostila::class);
    }
}
