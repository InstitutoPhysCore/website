<?php

namespace App\Models\Software;

use App\Models\Concerns\HasCover;
use App\Models\Concerns\ProtectsOnDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasCover, ProtectsOnDelete;

    // Especificar tabela para o recurso
    protected $table = "software_categorias";

    protected $guarded = [];

    // Softwares ficam sem categoria (continuam acessíveis) quando a categoria é excluída
    protected array $nullifyOnDelete = ['softwares'];

    public function softwares(): HasMany
    {
        return $this->hasMany(Software::class);
    }
}
