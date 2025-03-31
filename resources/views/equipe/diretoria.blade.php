<x-page-layout>

    <section class="bg-fixed" style="background-image: url({{ asset('images/cosmos.webp') }});">
        <div class="mx-auto max-w-screen-xl px-6 py-32">
            <div class="text-center">
                <h1 class="text-5xl font-extrabold sm:text-7xl text-white"> Diretoria </h1>
                <p class="mt-4 sm:text-xl text-white"> Diretoria do Projeto </p>
            </div>
        </div>
    </section>

    <x-container.primary class="text-center">
        <x-text.heading>{{ $secretaria['name'] }}</x-text.heading>
        <x-text.desc>Membros</x-text.desc>
    
        <div class="mt-12 grid grid-cols-2 gap-4 md:grid-cols-6 md:gap-8">
                {{-- Carregar membros de cada secretaria ignorando o diretor --}}
            @foreach ($secretaria->membros->whereNotIn('id', $secretaria->diretor->id) as $membro)
                <a href="/equipe/membro/{{ $membro->id }}"><blockquote class="transition hover:scale-105">
                    <div class="flex justify-center">
                        <div class="rounded-full h-32 w-32 bg-cover" style="background-image: url({{ asset('images/equipe/nicolasferreira.jpg') }});"></div>
                    </div>
                        <div class="p-4 w-full text-center">
                        <p class="text-lg font-bold">{{ $membro->name }}</p>
                        <p class="mt-2">{{ $membro->function }}</p>
                    </div>
                </blockquote></a>

            @endforeach
            
         </div>
    </x-container.primary>

</x-page-layout>