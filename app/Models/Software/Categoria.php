<?php

namespace App\Models\Software;

use App\Models\Software\Software;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    // Especificar tabela para o recurso
    protected $table = "software_categorias";

    protected $guarded = '';

    public function softwares(): HasMany
    {
        return $this->hasMany(Software::class);
    }
}
