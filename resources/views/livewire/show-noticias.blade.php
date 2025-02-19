@if($noticias->count())

<div class="mt-12 grid grid-cols-2 gap-12 xl:grid-cols-3" id="noticiasTable">
    <a class="transition cursor-pointer hover:scale-105"><blockquote class="flex items-center gap-4">
        <img class="rounded-lg w-48 cover" src="{{ asset('images/cosmos.webp') }}">
        <div class="flex-wrap">
            <h3 class="text-2xl font-bold">Noticias</h3>
            <p class="text-sm mt-2">Oi</p>
        </div>
    </blockquote></a>
</div>
 
@else
    <p class="text-center mt-12 text-sm opacity-75">Ops! Infelizmente não conseguimos encontrar nenhuma notícia :(</p>
@endif

<div class="mt-12 gap-4 text-center">
    {{ $noticias->links(data: ['scrollTo' => '#noticiasTable']) }}
</div>


