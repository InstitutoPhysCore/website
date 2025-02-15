<x-page-layout>

    <section class="bg-fixed" style="background-image: url({{ asset('images/cosmos.webp') }});">
        <div class="mx-auto max-w-screen-xl px-6 py-32">
            <div class="text-center">
                <h1 class="text-5xl font-extrabold sm:text-7xl text-white"> Equipe </h1>
                <p class="mt-4 sm:text-xl text-white"> Nossa Equipe </p>
            </div>
        </div>
    </section>

    <section id="diretoria" class="bg-zinc-900 text-gray-100">
        <div class="mx-auto max-w-screen-xl px-6 py-16 text-center">
            <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Procurando pela diretoria? </h2>
            <x-button.link-white class="mt-8 text-black" href="/diretoria">Clique aqui!</x-button.link-white>
            
        </div>
    </section>

    {{-- Carregar secretarias --}}
    @foreach ($secretarias as $secretaria)
        <x-container.primary class="text-center">
            <x-text.heading>{{ $secretaria['name'] }}</x-text.heading>
            <x-text.desc>Membros</x-text.desc>
        
            <div class="mt-12 grid grid-cols-2 gap-4 md:grid-cols-6 md:gap-8">
                {{-- Carregar diretor da secretaria --}}
                <a href="/equipe/membro/{{ $secretaria->diretor->id }}"><blockquote class="transition hover:scale-105">
                    <div class="flex justify-center">
                        <div class="rounded-full h-32 w-32 bg-cover" style="background-image: url({{ asset('images/equipe/nicolasferreira.jpg') }});"></div>
                    </div>

                    <div class="p-4 w-full text-center">
                        <p class="text-lg font-bold">{{ $secretaria->diretor->name }}</p>
                        <p class="mt-2">Diretor da Secretaria</p>
                    </div>
                </blockquote></a>

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
    @endforeach

</x-page-layout>