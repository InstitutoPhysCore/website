<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artigo extends Model
{
    use HasFactory;

    protected $guarded = '';

    public function autor(): BelongsTo
    {
        return $this->belongsTo(Equipe::class, 'author');
    }
}
