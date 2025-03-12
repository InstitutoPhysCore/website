<?php

namespace App\Models\Curso;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Serie extends Model
{
    public function curso(): HasMany
    {
        return $this->hasMany(Curso::class);
    }
}
