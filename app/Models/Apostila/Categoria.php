<?php

namespace App\Models\Apostila;

use App\Models\Concerns\HasCover;
use App\Models\Concerns\ProtectsOnDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Categoria extends Model
{
    use HasCover, ProtectsOnDelete;

    // Especificar tabela para o recurso
    protected $table = "apostila_categorias";

    protected $guarded = [];

    // Séries ficam sem categoria (continuam acessíveis) quando a categoria é excluída
    protected array $nullifyOnDelete = ['series'];

    public function series(): HasMany
    {
        return $this->hasMany(Serie::class);
    }

    // Apostilas da categoria através de uma série
    public function apostilas(): HasManyThrough
    {
        return $this->hasManyThrough(Apostila::class, Serie::class);
    }
}
