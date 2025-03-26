<?php

namespace App\Models\Curso;

use App\Models\Curso\Curso;
use App\Models\Curso\Serie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materia extends Model
{
    // Especificar tabela para o recurso
    protected $table = "curso_materias";

    // Retorna os cursos da matéria através de uma série
    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class, Serie::class);
    }

    
}
