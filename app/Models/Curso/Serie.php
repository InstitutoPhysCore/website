<?php

namespace App\Models\Curso;

use App\Models\Curso\Curso;
use App\Models\Curso\Materia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Serie extends Model
{
    // Especificar tabela para o recurso
    protected $table = "curso_series";

    /*
    Retorna as aulas da série
    */
    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class);
    }

    /* 
    Retorna a materia da série
    */
    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class);
    }
}
