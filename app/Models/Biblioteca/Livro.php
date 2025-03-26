<?php

namespace App\Models\Biblioteca;

use App\Models\Biblioteca\Categoria;
use App\Models\Biblioteca\Serie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livro extends Model
{
    // Especificar tabela para o recurso
    protected $table = "biblioteca";

    protected $guarded = '';

    /* 
    Retorna a serie de volumes associada com o recurso
    ['title', 'desc']
    */
    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }

    /* 
    Retorna a categoria do livro
    ['name', 'desc']
    */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
