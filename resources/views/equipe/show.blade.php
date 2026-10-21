<x-page-layout :title="$membro->name" :description="$membro->bio">
    <section class="mx-auto max-w-screen-xl px-6 py-16">
        <div class="flex flex-col items-center gap-8 sm:flex-row">
            <x-avatar :src="$membro->avatar_src" :name="$membro->name" size="w-48 h-48 text-6xl"/>
            <div>
                <h1 class="text-4xl sm:text-5xl font-bold">{{ $membro->name }}</h1>
                <h6 class="text-xl">{{ $membro->function }}</h6>
                @if ($membro->secretaria)
                    <div class="mt-4 flex gap-4">
                        <span class="whitespace-nowrap rounded-full text-white font-bold bg-violet-800 px-2.5 py-0.5 text-sm">{{ $membro->secretaria->name }}</span>
                    </div>
                @endif
                <p class="mt-4 max-w-2xl">{{ $membro->bio }}</p>
            </div>
        </div>
    </section>

    @if (filled($membro->about))
        <section>
            <div class="mx-auto max-w-screen-xl px-6 py-16">
                <h2 class="text-2xl font-bold tracking-tight sm:text-4xl"> Sobre </h2>
                <div class="mt-4 prose max-w-none">
                    {!! \Illuminate\Support\Str::markdown($membro->about, ['html_input' => 'strip', 'allow_unsafe_links' => false]) !!}
                </div>
            </div>
        </section>
    @endif

    <section>
        <div class="mx-auto max-w-screen-xl px-6 py-16">
            <h2 class="text-2xl font-bold tracking-tight sm:text-4xl"> Contribuições de {{ \Illuminate\Support\Str::before($membro->name, ' ') }} </h2>

            @if ($artigos->isNotEmpty() || $noticias->isNotEmpty())
                <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-3">
                    @foreach ($artigos as $artigo)
                        <x-card.item :href="route('artigos.show', $artigo)" :cover="$artigo->cover_src" :title="$artigo->title" meta="Artigo">{{ $artigo->desc }}</x-card.item>
                    @endforeach
                    @foreach ($noticias as $noticia)
                        <x-card.item :href="route('noticias.show', $noticia)" :cover="$noticia->cover_src" :title="$noticia->title" meta="Notícia">{{ $noticia->desc }}</x-card.item>
                    @endforeach
                </div>
            @else
                <x-empty class="!text-left">Ainda não há contribuições publicadas.</x-empty>
            @endif
        </div>
    </section>
</x-page-layout>
