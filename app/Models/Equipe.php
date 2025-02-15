<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipe extends Model
{
    public function secretaria(): BelongsTo
    {
        return $this->belongsTo(Secretaria::class);
    }
}
