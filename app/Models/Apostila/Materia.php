<?php

namespace App\Models\Apostila;

use App\Models\Apostila;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materia extends Model
{
    // Especificar tabela para o recurso
    protected $table = "apostilas_materias";

    public function apostilas(): HasMany
    {
        return $this->hasMany(Apostila::class);
    }
}
