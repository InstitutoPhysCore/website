<?php

namespace App\Models\Artigo;

use App\AuthorTrait;
use App\Models\Concerns\HasCover;
use App\Models\Concerns\RendersMarkdown;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artigo extends Model
{
    use HasFactory, AuthorTrait, HasCover, RendersMarkdown;

    protected $guarded = [];

    /*
    Retorna a categoria do artigo
    ['name', 'desc']
    */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
