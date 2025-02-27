<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Secretaria extends Model
{
    protected $guarded = "";

    public function membros(): HasMany
    {
        return $this->hasMany(Equipe::class);
    }

    public function diretor()
    {
        return $this->belongsTo(Equipe::class, 'diretor');
    }
}
