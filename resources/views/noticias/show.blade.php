<x-page-layout bg="images/cosmos.webp" :title="$noticia->title" :description="$noticia->desc">
    <x-container.primary class="rounded-lg my-12 !p-6 sm:!p-12 max-w-screen-lg bg-white">
        <x-author :model="$noticia"/>
        <h1 class="mt-6 text-4xl sm:text-6xl font-bold tracking-tight">{{ $noticia->title }}</h1>
        <h6 class="text-xl mt-2">{{ $noticia->desc }}</h6>
        <p class="text-xs mt-2 opacity-60">{{ $noticia->created_at?->translatedFormat('d \d\e F \d\e Y') }}</p>
        <div class="mt-12 prose max-w-none">
            {!! $noticia->content_html !!}
        </div>
        <div class="mt-12"><x-button.link href="{{ route('noticias.index') }}">Voltar às notícias</x-button.link></div>
    </x-container.primary>
</x-page-layout>
