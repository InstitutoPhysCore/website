<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Equipe extends Model
{
    protected $guarded = "";

    public function secretaria(): BelongsTo
    {
        return $this->belongsTo(Secretaria::class);
    }

    public function comando(): HasOne {
        return $this->hasOne(Secretaria::class, 'diretor');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function artigos(): HasMany
    {
        return $this->hasMany(Artigo::class);
    }
}
