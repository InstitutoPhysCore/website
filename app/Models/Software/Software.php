<?php

namespace App\Models\Software;

use App\AuthorTrait;
use App\Models\Concerns\HasCover;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Software extends Model
{
    use AuthorTrait, HasCover;

    protected $guarded = [];

    /*
    Retorna a categoria do software
    ['name', 'desc']
    */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function getRepoUrlAttribute(): string
    {
        return "https://github.com/{$this->owner}/{$this->repo}";
    }
}
