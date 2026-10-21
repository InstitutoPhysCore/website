<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait RendersMarkdown
{
    // Markdown do editor administrativo convertido em HTML sem permitir HTML cru nem links inseguros
    public function getContentHtmlAttribute(): string
    {
        return Str::markdown((string) $this->content, [
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
    }
}
