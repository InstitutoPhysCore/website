<x-page-layout bg="images/cosmos.webp" :title="$artigo->title" :description="$artigo->desc">
    <x-container.primary class="rounded-lg my-12 !p-6 sm:!p-12 max-w-screen-lg bg-white">
        <x-author :model="$artigo"/>
        @if ($artigo->categoria)
            <a href="{{ route('artigos.index', ['categoria' => $artigo->categoria_id]) }}" class="mt-6 inline-block rounded-full bg-violet-800 px-3 py-1 text-xs font-bold text-white">{{ $artigo->categoria->name }}</a>
        @endif
        <h1 class="mt-4 text-4xl sm:text-6xl font-bold tracking-tight">{{ $artigo->title }}</h1>
        <h6 class="text-xl mt-2">{{ $artigo->desc }}</h6>
        <p class="text-xs mt-2 opacity-60">Publicado em {{ $artigo->created_at?->translatedFormat('d \d\e F \d\e Y') }}</p>
        <div class="mt-12 prose max-w-none">
            {!! $artigo->content_html !!}
        </div>
        <div class="mt-12"><x-button.link href="{{ route('artigos.index') }}">Voltar aos artigos</x-button.link></div>
    </x-container.primary>
</x-page-layout>
