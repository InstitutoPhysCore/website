<?php

namespace App\Models\Biblioteca;

use App\Models\Livro;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Serie extends Model
{
    // Especificar tabela para o recurso
    protected $table = "biblioteca_series";

    public function livros(): HasMany
    {
        return $this->hasMany(Livro::class);
    }
}
