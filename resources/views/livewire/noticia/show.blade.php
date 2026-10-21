<div>
@if ($noticias->count())
    <div class="mt-12 grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3" id="noticiasTable">
        @foreach ($noticias as $noticia)
            <a href="{{ route('noticias.show', $noticia) }}" wire:key="noticia-{{ $noticia->id }}" class="transition hover:scale-[1.02]"><blockquote class="flex items-center gap-4">
                <img class="rounded-lg w-32 sm:w-48 aspect-video object-cover" src="{{ $noticia->cover_src }}" alt="">
                <div>
                    <h3 class="text-xl font-bold">{{ $noticia->title }}</h3>
                    <p class="text-sm mt-2">{{ $noticia->desc }}</p>
                    <p class="text-xs mt-2 opacity-60">{{ $noticia->created_at?->translatedFormat('d \d\e F \d\e Y') }}</p>
                </div>
            </blockquote></a>
        @endforeach
    </div>

    <div class="mt-12 text-center">
        {{ $noticias->links(data: ['scrollTo' => '#noticiasTable']) }}
    </div>
@else
    <x-empty>Ops! Infelizmente não conseguimos encontrar nenhuma notícia :(</x-empty>
@endif
</div>
