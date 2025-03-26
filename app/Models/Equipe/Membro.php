<?php

namespace App\Models\Equipe;

use App\Models\User;
use App\Models\Artigo\Artigo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Membro extends Model
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
}
