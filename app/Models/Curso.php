<?php

namespace App\Models;

use App\Author;
use App\AuthorTrait;
use App\Models\Curso\Serie;
use App\Models\Curso\Materia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curso extends Model
{
    // Importar trait de autores
    use AuthorTrait;

    protected $guarded = '';

    /* 
    Retorna a serie de cursos associada com o recurso
    ['title', 'desc']
    */
    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }

    /* 
    Retorna a materia do curso
    ['name', 'desc']
    */
    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class);
    }

}
