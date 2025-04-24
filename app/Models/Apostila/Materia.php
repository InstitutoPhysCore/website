<?php

namespace App\Models\Apostila;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materia extends Model
{
    // Especificar tabela para o recurso
    protected $table = "apostila_materias";

    protected $guarded = '';

    public function apostilas(): HasMany
    {
        return $this->hasMany(Apostila::class);
    }
}
