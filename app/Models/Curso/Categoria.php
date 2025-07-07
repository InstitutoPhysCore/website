<?php

namespace App\Models\Curso;

use App\Models\Curso\Aula;
use App\Models\Curso\Serie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    // Especificar tabela para o recurso
    protected $table = "cursos_categorias";

    protected $guarded = '';

    // Retorna as aulas da matéria através de uma série
    public function aulas(): HasMany
    {
        return $this->hasMany(Aula::class, Serie::class);
    }

    
}
