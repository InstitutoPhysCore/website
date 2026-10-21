<?php

namespace App\Models\Equipe;

use App\Models\Concerns\HasCover;
use App\Models\Concerns\ProtectsOnDelete;
use App\Models\User;
use App\Support\AuthorUsage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Membro extends Model
{
    use HasCover, ProtectsOnDelete;

    protected $guarded = [];

    // A secretaria que o membro dirige deixa de ter diretor
    protected array $nullifyOnDelete = ['comando'];

    protected function coverColumn(): string
    {
        return 'avatar_url';
    }

    // Foto do membro ou null (as views mostram as iniciais)
    public function getAvatarSrcAttribute(): ?string
    {
        return static::fileUrl($this->avatar_url);
    }

    public function secretaria(): BelongsTo
    {
        return $this->belongsTo(Secretaria::class);
    }

    public function comando(): HasOne {
        return $this->hasOne(Secretaria::class, 'diretor_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function extraDeleteBlockers(): array
    {
        $count = AuthorUsage::count(AuthorUsage::MEMBRO, $this->id);

        return $count ? ["Este membro assina {$count} conteúdo(s)."] : [];
    }
}
