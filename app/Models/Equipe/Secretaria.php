<?php

namespace App\Models\Equipe;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Secretaria extends Model
{
    protected $guarded = "";

    public function membros(): HasMany
    {
        return $this->hasMany(Membro::class);
    }

    public function diretor(): BelongsTo
    {
        return $this->belongsTo(Membro::class, 'diretor');
    }
}
