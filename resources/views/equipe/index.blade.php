<x-page-layout title="Equipe">
    <x-hero title="Equipe" subtitle="Nossa Equipe"/>

    <section id="diretoria" class="bg-zinc-900 text-gray-100">
        <div class="mx-auto max-w-screen-xl px-6 py-16 text-center">
            <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Procurando pela diretoria? </h2>
            <x-button.link-white class="mt-8 text-black" href="{{ route('equipe.page.diretoria') }}">Clique aqui!</x-button.link-white>
        </div>
    </section>

    @forelse ($secretarias as $secretaria)
        <x-container.primary class="text-center">
            <x-text.heading>{{ $secretaria->name }}</x-text.heading>
            <x-text.desc>{{ $secretaria->desc }}</x-text.desc>

            @php($membros = $secretaria->membros->sortBy(fn ($m) => [$m->id === $secretaria->diretor_id ? 0 : 1, $m->name]))
            @if ($membros->isNotEmpty())
                <div class="mt-12 grid grid-cols-2 gap-4 md:grid-cols-6 md:gap-8">
                    @foreach ($membros as $membro)
                        <x-equipe.card :membro="$membro" :diretor="$membro->id === $secretaria->diretor_id"/>
                    @endforeach
                </div>
            @else
                <x-empty>Esta secretaria ainda não tem membros cadastrados.</x-empty>
            @endif
        </x-container.primary>
    @empty
        <x-container.primary><x-empty>A equipe ainda não foi cadastrada.</x-empty></x-container.primary>
    @endforelse
</x-page-layout>
