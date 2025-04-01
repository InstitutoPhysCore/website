<?php

namespace App\Models\Equipe;

use App\Models\Equipe\Membro;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialMedia extends Model
{
    public function socialmedia(): BelongsTo
    {
        return $this->belongsTo(Membro::class);
    }
}
