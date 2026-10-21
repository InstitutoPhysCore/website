<?php

namespace App\Models\Artigo;

use App\Models\Concerns\HasCover;
use App\Models\Concerns\ProtectsOnDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasCover, ProtectsOnDelete;

    // Especificar tabela para o recurso
    protected $table = "artigo_categorias";

    protected $guarded = [];

    // Artigos ficam sem categoria (continuam acessíveis) quando a categoria é excluída
    protected array $nullifyOnDelete = ['artigos'];

    public function artigos(): HasMany
    {
        return $this->hasMany(Artigo::class);
    }
}
