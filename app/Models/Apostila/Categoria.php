<?php

namespace App\Models\Apostila;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    // Especificar tabela para o recurso
    protected $table = "apostila_categorias";

    protected $guarded = '';

    public function apostilas(): HasMany
    {
        return $this->hasMany(Apostila::class);
    }
}
