<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Noticia extends Model
{
    public function author(): HasOne {
        return $this->hasOne(Equipe::class);
    }
}
