<?php

namespace App\Models\Author;

use App\Models\Concerns\HasCover;
use App\Models\Concerns\ProtectsOnDelete;
use App\Support\AuthorUsage;
use Illuminate\Database\Eloquent\Model;

// Autor externo (que não pertence à equipe)
class Author extends Model
{
    use HasCover, ProtectsOnDelete;

    protected $guarded = [];

    protected function extraDeleteBlockers(): array
    {
        $count = AuthorUsage::count(AuthorUsage::EXTERNO, $this->id);

        return $count ? ["Este autor assina {$count} conteúdo(s)."] : [];
    }
}
