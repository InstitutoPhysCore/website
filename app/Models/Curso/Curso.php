<?php

namespace App\Models\Curso;

use App\Author;
use App\AuthorTrait;
use App\Models\Curso\Serie;
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

}
