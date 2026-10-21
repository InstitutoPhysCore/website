<?php

namespace App;

use App\Models\Author\Author as ForeignAuthor;
use App\Models\Equipe\Membro;
use App\Models\Equipe\Secretaria;
use App\Support\AuthorUsage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/*
Retorna uma equipe, secretaria ou autor de foreign ID 'author_id' dependendo do inteiro 'author_type'
(0 = membro, 1 = secretaria, 2 = autor externo)
*/

trait AuthorTrait {

    public function author(): BelongsTo {

        $class = match ((int) $this->author_type) {
            AuthorUsage::SECRETARIA => Secretaria::class,
            AuthorUsage::EXTERNO => ForeignAuthor::class,
            default => Membro::class,
        };

        return $this->belongsTo($class, 'author_id');
    }

    public function getAuthorNameAttribute(): ?string
    {
        return $this->author?->name;
    }

    // Subtítulo exibido junto ao autor
    public function getAuthorRoleAttribute(): ?string
    {
        $author = $this->author;

        return match (true) {
            $author instanceof Membro => $author->function,
            $author instanceof Secretaria => 'Secretaria',
            $author instanceof ForeignAuthor => 'Autor externo',
            default => null,
        };
    }

    public function getAuthorLinkAttribute(): ?string
    {
        $author = $this->author;

        return match (true) {
            $author instanceof Membro => route('equipe.show', $author),
            $author instanceof ForeignAuthor => $author->link,
            default => null,
        };
    }

    public function getAuthorAvatarAttribute(): ?string
    {
        $author = $this->author;

        return match (true) {
            $author instanceof Membro => $author->avatar_src,
            $author instanceof Secretaria, $author instanceof ForeignAuthor => $author->has_cover ? $author->cover_src : null,
            default => null,
        };
    }
}
