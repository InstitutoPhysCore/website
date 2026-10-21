<?php

namespace App\Models\Noticia;

use App\AuthorTrait;
use App\Models\Concerns\HasCover;
use App\Models\Concerns\RendersMarkdown;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use AuthorTrait, HasCover, RendersMarkdown;

    protected $guarded = [];
}
