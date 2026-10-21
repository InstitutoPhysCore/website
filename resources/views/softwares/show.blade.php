<x-page-layout bg="images/cosmos.webp" :title="$software->name" :description="$software->desc">
    <x-container.primary class="rounded-lg my-12 !p-6 sm:!p-12 max-w-screen-lg bg-white">
        <x-author :model="$software"/>
        @if ($software->categoria)
            <a href="{{ route('softwares.index', ['categoria' => $software->categoria_id]) }}" class="mt-6 inline-block rounded-full bg-violet-800 px-3 py-1 text-xs font-bold text-white">{{ $software->categoria->name }}</a>
        @endif
        <h1 class="mt-4 text-4xl sm:text-6xl font-bold tracking-tight">{{ $software->name }}</h1>
        <h6 class="text-xl mt-2">{{ $software->desc }}</h6>
        <div class="mt-8 flex flex-wrap gap-4">
            <x-button.link href="{{ $software->repo_url }}" target="_blank" rel="noopener noreferrer">Ver no GitHub</x-button.link>
            <x-button.link class="!bg-zinc-800" href="{{ route('softwares.index') }}">Voltar aos softwares</x-button.link>
        </div>
    </x-container.primary>
</x-page-layout>
