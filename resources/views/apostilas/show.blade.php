<x-page-layout bg="images/cosmos.webp" :title="$apostila->title" :description="$apostila->desc">
    <x-container.primary class="rounded-lg my-12 !p-6 sm:!p-12 max-w-screen-lg bg-white">
        <x-author :model="$apostila"/>
        @if ($apostila->serie?->categoria)
            <a href="{{ route('apostilas.index', ['categoria' => $apostila->serie->categoria_id]) }}" class="mt-6 inline-block rounded-full bg-violet-800 px-3 py-1 text-xs font-bold text-white">{{ $apostila->serie->categoria->name }}</a>
        @endif
        <h1 class="mt-4 text-4xl sm:text-6xl font-bold tracking-tight">{{ $apostila->title }}</h1>
        <h6 class="text-xl mt-2">{{ $apostila->desc }}</h6>
        @if ($apostila->serie)
            <p class="mt-2 text-sm opacity-70">Série: {{ $apostila->serie->title }}@if ($apostila->volume) · Volume {{ $apostila->volume }}@endif</p>
        @endif
        <div class="mt-8 flex flex-wrap gap-4">
            @if ($apostila->attachment_src)
                <x-button.link href="{{ $apostila->attachment_src }}" target="_blank" rel="noopener noreferrer">Baixar apostila (PDF)</x-button.link>
            @endif
            <x-button.link class="!bg-zinc-800" href="{{ route('apostilas.index') }}">Voltar às apostilas</x-button.link>
        </div>
    </x-container.primary>
</x-page-layout>
