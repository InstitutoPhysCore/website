<?php

namespace App\Models\Curso;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materia extends Model
{
    // Especificar tabela para o recurso
    protected $table = "cursos_materias";

    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class);
    }
}
