<?php

namespace App\Models\Biblioteca;

use App\Models\Biblioteca\Livro;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Serie extends Model
{
    // Especificar tabela para o recurso
    protected $table = "biblioteca_series";

    protected $guarded = '';

    public function livros(): HasMany
    {
        return $this->hasMany(Livro::class);
    }

    /* 
    Retorna a categoria da série
    ['name', 'desc']
    */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }  
}
