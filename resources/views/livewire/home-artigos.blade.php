

<div id="artigosTable" class="mt-12 grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-8">

        @foreach ($artigos as $artigo)
            <a href="/artigos/{{ $artigo->id }}"><blockquote class="rounded-lg shadow transition hover:bg-neutral-100/75 hover:scale-105 hover:shadow-xl">
                <div class="rounded-t-lg h-32 w-full bg-cover" style="background-image: url({{ asset('images/cosmos.webp') }});"></div>
                <div class="p-8">
                <p class="text-lg font-bold">{{ $artigo->title }}</p>
                <p class="mt-2">{{ $artigo->desc }}</p>
            </div>
        </blockquote></a>
    @endforeach
</div>

