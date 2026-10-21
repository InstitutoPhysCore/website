<?php

namespace App\Models\Biblioteca;

use App\Models\Concerns\HasCover;
use App\Models\Concerns\ProtectsOnDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Serie extends Model
{
    use HasCover, ProtectsOnDelete;

    // Especificar tabela para o recurso
    protected $table = "biblioteca_series";

    protected $guarded = [];

    protected array $restrictDelete = ['livros' => 'livro(s)'];

    public function livros(): HasMany
    {
        return $this->hasMany(Livro::class);
    }

    /*
    Retorna a categoria da série
    ['name', 'desc']
    */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function deleteLabel(): string
    {
        return $this->title;
    }
}
