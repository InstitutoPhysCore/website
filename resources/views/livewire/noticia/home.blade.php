<div>
@if ($noticias->count())
    @if ($noticias->count() === 4)
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-4 lg:gap-6 lg:h-96">
            <x-card.home-news class="col-span-2 lg:row-span-2" :href="route('noticias.show', $noticias[0])" :title="$noticias[0]->title" :cover="$noticias[0]->cover_src"/>
            <x-card.home-news class="col-span-2" :href="route('noticias.show', $noticias[1])" :title="$noticias[1]->title" :cover="$noticias[1]->cover_src"/>
            <x-card.home-news :href="route('noticias.show', $noticias[2])" :title="$noticias[2]->title" :cover="$noticias[2]->cover_src"/>
            <x-card.home-news :href="route('noticias.show', $noticias[3])" :title="$noticias[3]->title" :cover="$noticias[3]->cover_src"/>
        </div>
    @else
        <div class="grid grid-cols-1 gap-4 md:grid-cols-{{ min($noticias->count(), 3) }} md:gap-6">
            @foreach ($noticias as $noticia)
                <x-card.home-news class="min-h-64" :href="route('noticias.show', $noticia)" :title="$noticia->title" :cover="$noticia->cover_src"/>
            @endforeach
        </div>
    @endif
@else
    <x-empty>Pelo visto não temos nada a noticiar :(</x-empty>
@endif
</div>
