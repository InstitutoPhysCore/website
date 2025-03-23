<?php

namespace App\Models\Curso;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Serie extends Model
{
    // Especificar tabela para o recurso
    protected $table = "cursos_series";

    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class);
    }
}
