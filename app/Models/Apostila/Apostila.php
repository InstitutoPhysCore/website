<?php

namespace App\Models\Apostila;

use App\Models\Apostila\Serie;
use App\Models\Apostila\Materia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Apostila extends Model
{
    protected $guarded = '';

    /* 
    Retorna a serie de volumes associada com o recurso
    ['title', 'desc']
    */
    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }

    /* 
    Retorna a materia da apostila
    ['name', 'desc']
    */
    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class);
    }

}
