<x-page-layout bg="images/cosmos.webp" :title="$aula->title" :description="$aula->desc">
    <x-container.primary class="rounded-lg my-12 !p-6 sm:!p-12 max-w-screen-lg bg-white">
        <a href="{{ route('cursos.show', $serie) }}" class="text-sm font-bold text-violet-700 hover:underline">&larr; {{ $serie->title }}</a>
        <h1 class="mt-4 text-3xl sm:text-5xl font-bold tracking-tight">Aula {{ $aula->episode }}: {{ $aula->title }}</h1>
        <h6 class="text-xl mt-2">{{ $aula->desc }}</h6>

        <div class="mt-8">
            @if ($aula->embed_url)
                <iframe class="w-full aspect-video rounded-lg shadow-lg" src="{{ $aula->embed_url }}" title="{{ $aula->title }}" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            @elseif ($aula->video_link)
                <x-button.link href="{{ $aula->video_link }}" target="_blank" rel="noopener noreferrer">Assistir à aula</x-button.link>
            @else
                <x-empty>O vídeo desta aula ainda não está disponível.</x-empty>
            @endif
        </div>

        <div class="mt-8"><x-author :model="$aula"/></div>

        <h2 class="mt-12 text-2xl font-bold">Outras aulas do curso</h2>
        <div class="mt-4 flex flex-wrap gap-2">
            @foreach ($aulas as $outra)
                <a href="{{ route('cursos.aula', $outra) }}" title="{{ $outra->title }}" @class(['rounded-full px-4 py-2 text-sm font-medium', 'bg-violet-600 text-white' => $outra->is($aula), 'bg-neutral-200 hover:bg-neutral-300' => ! $outra->is($aula)])>{{ $outra->episode }}. {{ \Illuminate\Support\Str::limit($outra->title, 30) }}</a>
            @endforeach
        </div>
    </x-container.primary>
</x-page-layout>
