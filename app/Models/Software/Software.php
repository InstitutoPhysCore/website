<?php

namespace App\Models\Software;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Software extends Model
{
    /* 
    Retorna a categoria do software
    ['name', 'desc']
    */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
