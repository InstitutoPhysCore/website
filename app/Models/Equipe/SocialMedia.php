<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialMedia extends Model
{
    
    public function socialmedia(): BelongsTo
    {
        return $this->belongsTo(Equipe::class);
    }
}
