<?php

namespace App\Models\Biblioteca;

use App\Models\Concerns\HasCover;
use App\Models\Concerns\ProtectsOnDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Categoria extends Model
{
    use HasCover, ProtectsOnDelete;

    // Especificar tabela para o recurso
    protected $table = "biblioteca_categorias";

    protected $guarded = [];

    // Séries ficam sem categoria (continuam acessíveis) quando a categoria é excluída
    protected array $nullifyOnDelete = ['series'];

    // Retornar as séries de uma categoria
    public function series(): HasMany
    {
        return $this->hasMany(Serie::class);
    }

    // Retornar os livros da categoria através de uma série
    public function livros(): HasManyThrough
    {
        return $this->hasManyThrough(Livro::class, Serie::class);
    }
}
