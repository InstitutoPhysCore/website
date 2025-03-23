<?php

namespace App\Models;

use App\AuthorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artigo extends Model
{
    use HasFactory;
    use AuthorTrait;
    
    protected $guarded = '';
}
