<?php

namespace App\Models\Biblioteca;

use App\AuthorTrait;
use App\Models\Concerns\HasCover;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livro extends Model
{
    use AuthorTrait, HasCover;

    // Especificar tabela para o recurso
    protected $table = "biblioteca";

    protected $guarded = [];

    protected function hasAttachment(): bool
    {
        return true;
    }

    /*
    Retorna a serie de volumes associada com o recurso
    ['title', 'desc']
    */
    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }

    public function getCategoriaAttribute()
    {
        return $this->serie?->categoria;
    }
}
