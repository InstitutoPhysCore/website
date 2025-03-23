<?php

namespace App\Models;

use App\AuthorTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Noticia extends Model
{
    use AuthorTrait;
}
