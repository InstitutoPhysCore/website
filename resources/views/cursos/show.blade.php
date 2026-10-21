<x-page-layout bg="images/cosmos.webp" :title="$serie->title" :description="$serie->desc">
    <x-container.primary class="rounded-lg my-12 !p-6 sm:!p-12 max-w-screen-lg bg-white">
        @if ($serie->categoria)
            <a href="{{ route('cursos.index', ['categoria' => $serie->categoria_id]) }}" class="inline-block rounded-full bg-violet-800 px-3 py-1 text-xs font-bold text-white">{{ $serie->categoria->name }}</a>
        @endif
        <h1 class="mt-4 text-4xl sm:text-6xl font-bold tracking-tight">{{ $serie->title }}</h1>
        <h6 class="text-xl mt-2">{{ $serie->desc }}</h6>

        <h2 class="mt-12 text-2xl font-bold">Aulas</h2>
        @forelse ($aulas as $aula)
            <a href="{{ route('cursos.aula', $aula) }}" class="mt-4 flex items-center gap-4 rounded-lg p-4 shadow transition hover:bg-neutral-100">
                <span class="inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-violet-800 font-bold text-white">{{ $aula->episode }}</span>
                <span>
                    <span class="block font-bold">{{ $aula->title }}</span>
                    <span class="block text-sm opacity-80">{{ $aula->desc }}</span>
                </span>
            </a>
        @empty
            <x-empty>Este curso ainda não tem aulas publicadas.</x-empty>
        @endforelse

        <div class="mt-12"><x-button.link href="{{ route('cursos.index') }}">Voltar aos cursos</x-button.link></div>
    </x-container.primary>
</x-page-layout>
