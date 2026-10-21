<x-page-layout title="Diretoria">
    <x-hero title="Diretoria" subtitle="Diretoria do Projeto"/>

    <x-container.primary class="text-center">
        @if ($secretarias->isNotEmpty())
            <div class="grid grid-cols-2 gap-4 md:grid-cols-4 md:gap-8">
                @foreach ($secretarias as $secretaria)
                    <div>
                        <x-equipe.card :membro="$secretaria->diretor" :diretor="true"/>
                        <p class="text-sm opacity-75">{{ $secretaria->name }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <x-empty>A diretoria ainda não foi cadastrada.</x-empty>
        @endif
    </x-container.primary>
</x-page-layout>
