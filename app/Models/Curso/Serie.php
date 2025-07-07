<?php

namespace App\Models\Curso;

use App\Models\Curso\Aula;
use App\Models\Curso\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Serie extends Model
{
    // Especificar tabela para o recurso
    protected $table = "cursos_series";

    protected $guarded = '';

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
}
