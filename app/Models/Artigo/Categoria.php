<?php

namespace App\Models\Artigo;

use App\Models\Artigo\Artigo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    // Especificar tabela para o recurso
    protected $table = "artigo_categorias";

    public function artigos(): HasMany
    {
        return $this->hasMany(Artigo::class);
    }
}
