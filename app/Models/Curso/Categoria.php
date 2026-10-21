<?php

namespace App\Models\Curso;

use App\Models\Concerns\HasCover;
use App\Models\Concerns\ProtectsOnDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Categoria extends Model
{
    use HasCover, ProtectsOnDelete;

    // Especificar tabela para o recurso
    protected $table = "cursos_categorias";

    protected $guarded = [];

    // Séries ficam sem categoria (continuam acessíveis) quando a categoria é excluída
    protected array $nullifyOnDelete = ['series'];

    // Retorna as séries da categoria
    public function series(): HasMany
    {
        return $this->hasMany(Serie::class);
    }

    // Retorna as aulas da categoria através de uma série
    public function aulas(): HasManyThrough
    {
        return $this->hasManyThrough(Aula::class, Serie::class);
    }
}
