<?php

namespace App\Models\Artigo;

use App\AuthorTrait;
use App\Models\Artigo\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artigo extends Model
{
    use HasFactory;
    use AuthorTrait;
    
    protected $guarded = '';
    
    /* 
    Retorna a categoria do livro
    ['name', 'desc']
    */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
