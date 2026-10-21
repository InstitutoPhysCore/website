<div>
    @if ($itens->count())
        <div class="mt-12 grid grid-cols-1 gap-6 md:grid-cols-3">
            @foreach ($itens as $item)
                <x-card.item :dark="$escuro" :href="route($config['rota'], $item)" :cover="$item->cover_src" :title="$item->{$config['coluna_titulo']}" :meta="($config['meta'])($item)">
                    {{ $item->desc }}
                </x-card.item>
            @endforeach
        </div>
    @else
        <x-empty>Ainda não há {{ mb_strtolower($config['titulo']) }} publicados.</x-empty>
    @endif
</div>
