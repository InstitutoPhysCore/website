<?php

namespace App\Models\Curso;

use App\Models\Concerns\HasCover;
use App\Models\Concerns\ProtectsOnDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Serie extends Model
{
    use HasCover, ProtectsOnDelete;

    // Especificar tabela para o recurso
    protected $table = "cursos_series";

    protected $guarded = [];

    protected array $restrictDelete = ['aulas' => 'aula(s)'];

    public function getRouteKeyName(): string
    {
        return 'id';
    }

    /*
    Retorna as aulas da série
    */
    public function aulas(): HasMany
    {
        return $this->hasMany(Aula::class);
    }

    /*
    Retorna a categoria da série
    */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function deleteLabel(): string
    {
        return $this->title;
    }
}
