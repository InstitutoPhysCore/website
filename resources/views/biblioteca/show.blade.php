<x-page-layout bg="images/cosmos.webp" :title="$livro->title" :description="$livro->desc">
    <x-container.primary class="rounded-lg my-12 !p-6 sm:!p-12 max-w-screen-lg bg-white">
        <x-author :model="$livro"/>
        @if ($livro->serie?->categoria)
            <a href="{{ route('biblioteca.index', ['categoria' => $livro->serie->categoria_id]) }}" class="mt-6 inline-block rounded-full bg-violet-800 px-3 py-1 text-xs font-bold text-white">{{ $livro->serie->categoria->name }}</a>
        @endif
        <h1 class="mt-4 text-4xl sm:text-6xl font-bold tracking-tight">{{ $livro->title }}</h1>
        <h6 class="text-xl mt-2">{{ $livro->desc }}</h6>
        @if ($livro->serie)
            <p class="mt-2 text-sm opacity-70">Série: {{ $livro->serie->title }}@if ($livro->volume) · Volume {{ $livro->volume }}@endif</p>
        @endif
        <div class="mt-8 flex flex-wrap gap-4">
            @if ($livro->attachment_src)
                <x-button.link href="{{ $livro->attachment_src }}" target="_blank" rel="noopener noreferrer">Baixar livro (PDF)</x-button.link>
            @endif
            <x-button.link class="!bg-zinc-800" href="{{ route('biblioteca.index') }}">Voltar à biblioteca</x-button.link>
        </div>
    </x-container.primary>
</x-page-layout>
