<div class="grid grid-cols-2 lg:grid-cols-4 gap-8 h-96">
    <x-card.home-news class="col-span-2 lg:row-span-2" title="{{ $noticias[0]->title }}" cover="{{ $noticias[0]->cover }}">
        {{ $noticias[0]->desc }}
    </x-card.home-news>

    <x-card.home-news class="col-span-2 lg:row-span-1" title="{{ $noticias[1]->title }}" cover="{{ $noticias[1]->cover }}">
        {{ $noticias[1]->desc }}
    </x-card.home-news> 

    <x-card.home-news title="{{ $noticias[2]->title }}" cover="{{ $noticias[2]->cover }}">
        {{ $noticias[2]->desc }}
    </x-card.home-news>

    <x-card.home-news title="{{ $noticias[3]->title }}" cover="{{ $noticias[3]->cover }}">
        {{ $noticias[3]->desc }}
    </x-card.home-news>
</div>
