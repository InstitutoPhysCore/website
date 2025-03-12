<?php

namespace App;

use App\Models\Author\Author as ForeignAuthor;
use Dom\Attr;
use App\Models\Equipe;
use App\Models\Secretaria;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/*
Retorna uma equipe, secretaria ou autor de foreign ID 'author_id' dependendo do integer 'author_type'
*/

trait AuthorTrait {

    public function author(): BelongsTo {

        switch($this->author_type) {
            
            // Caso para retornar um membro
            case 0:
                $author = $this->belongsTo(Equipe::class, 'author_id');
                break;

            // Caso para retornar uma secretaria
            case 1:
                $author = $this->belongsTo(Secretaria::class, 'author_id');
                break;

            // Caso para retornar um autor de fora
            case 2:
                $author = $this->belongsTo(ForeignAuthor::class, 'author_id');
                break;
        }

        return $author;
    }
}
