<?php

namespace App\Models;

use App\Models\Curso\Serie;
use App\Models\Curso\Materia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curso extends Model
{
    // Retorna a serie de cursos associada com o recurso
    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }

    // Retorna a respectiva materia do recurso
    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class);
    }

    public function author(): BelongsTo
    {
        $secretaria = $this->belongsTo(Secretaria::class) ?? new Secretaria([
            'name' => 'Instituto PhysCore'
        ]);

        return $this->belongsTo(Equipe::class) ?? $secretaria;
    }
}
