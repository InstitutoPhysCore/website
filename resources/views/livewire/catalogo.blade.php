<x-container.primary id="{{ $tipo }}">
    <x-text.heading class="text-center">{{ $config['titulo'] }}</x-text.heading>
    <x-text.desc class="text-center">{{ $config['subtitulo'] }}</x-text.desc>

    {{-- Categorias --}}
    @if ($categorias->isNotEmpty())
        <div class="mt-12 flex flex-wrap justify-center gap-3" role="group" aria-label="Categorias">
            <button type="button" wire:click="selecionarCategoria(null)"
                @class(['rounded-full px-5 py-2 text-sm font-medium transition', 'bg-violet-600 text-white' => ! $categoria, 'bg-neutral-200 hover:bg-neutral-300 text-neutral-800' => $categoria])>
                Todas
            </button>
            @foreach ($categorias as $cat)
                <button type="button" wire:key="cat-{{ $cat->id }}" wire:click="selecionarCategoria({{ $cat->id }})" title="{{ $cat->desc }}"
                    @class(['rounded-full px-5 py-2 text-sm font-medium transition', 'bg-violet-600 text-white' => $categoria === $cat->id, 'bg-neutral-200 hover:bg-neutral-300 text-neutral-800' => $categoria !== $cat->id])>
                    {{ $cat->name }} <span class="opacity-70">({{ $cat->{$config['categoria_rel'].'_count'} }})</span>
                </button>
            @endforeach
        </div>
    @endif

    {{-- Filtros --}}
    <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
            <x-form.label for="busca-{{ $tipo }}"> Pesquisar </x-form.label>
            <x-form.input wire:model.live.debounce.400ms="busca" id="busca-{{ $tipo }}" name="busca" type="search" placeholder="Pesquisar em {{ mb_strtolower($config['titulo']) }}"/>
        </div>
        <div>
            <x-form.label for="ordem-{{ $tipo }}"> Classificação </x-form.label>
            <select wire:model.live="ordem" id="ordem-{{ $tipo }}" class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
                <option value="recentes">Mais Recentes</option>
                <option value="antigos">Mais Antigos</option>
                <option value="az">Ordem alfabética</option>
            </select>
        </div>
    </div>

    {{-- Resultados --}}
    <div wire:loading.delay class="mt-8 text-center text-sm opacity-75">Carregando...</div>

    @if ($itens->count())
        <div id="{{ $tipo }}Lista" class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($itens as $item)
                <x-card.item wire:key="item-{{ $item->getKey() }}" :href="route($config['rota'], $item)" :cover="$item->cover_src" :title="$item->{$config['coluna_titulo']}" :meta="($config['meta'])($item)">
                    {{ $item->desc }}
                </x-card.item>
            @endforeach
        </div>

        <div class="mt-12 text-center">
            {{ $itens->links(data: ['scrollTo' => '#'.$tipo.'Lista']) }}
        </div>
    @else
        <x-empty>
            @if ($busca !== '' || $categoria)
                Não foi possível encontrar nenhum(a) {{ $config['singular'] }} que correspondesse à sua pesquisa.
                <button type="button" wire:click="limpar" class="underline text-violet-600">Limpar filtros</button>
            @else
                Ainda não há {{ mb_strtolower($config['titulo']) }} publicados. Volte em breve!
            @endif
        </x-empty>
    @endif
</x-container.primary>
