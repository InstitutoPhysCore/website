<?php

namespace App\Models\Curso;

use App\AuthorTrait;
use App\Models\Concerns\HasCover;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aula extends Model
{
    // Importar trait de autores
    use AuthorTrait, HasCover;

    // Especificar tabela para o recurso
    protected $table = 'cursos';

    protected $guarded = [];

    /*
    Retorna a serie de cursos associada com o recurso
    ['title', 'desc']
    */
    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }

    // O campo "attachment" guarda o link do vídeo (YouTube ou outro endereço externo)
    public function getEmbedUrlAttribute(): ?string
    {
        $url = (string) $this->attachment;

        if (preg_match('~(?:youtube\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/)|youtu\.be/)([\w-]{11})~', $url, $m)) {
            return 'https://www.youtube-nocookie.com/embed/'.$m[1];
        }

        return null;
    }

    public function getVideoLinkAttribute(): ?string
    {
        return static::fileUrl($this->attachment);
    }
}
