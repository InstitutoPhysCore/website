<?php

namespace App;

use Dom\Attr;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Author
{
    public function author(): BelongsTo {
        switch($this->author_type) {
            case 1:

            case 2:

            case 3:A
        }
    }
}
