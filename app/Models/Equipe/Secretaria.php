<?php

namespace App\Models\Equipe;

use App\Models\Concerns\HasCover;
use App\Models\Concerns\ProtectsOnDelete;
use App\Support\AuthorUsage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Secretaria extends Model
{
    use HasCover, ProtectsOnDelete;

    protected $guarded = [];

    protected array $restrictDelete = ['membros' => 'membro(s)'];

    public function membros(): HasMany
    {
        return $this->hasMany(Membro::class);
    }

    public function diretor(): BelongsTo
    {
        return $this->belongsTo(Membro::class, 'diretor_id');
    }

    protected function extraDeleteBlockers(): array
    {
        $count = AuthorUsage::count(AuthorUsage::SECRETARIA, $this->id);

        return $count ? ["Esta secretaria assina {$count} conteúdo(s)."] : [];
    }
}
