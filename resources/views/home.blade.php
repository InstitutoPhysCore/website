<x-page-layout>
    <section class="bg-fixed" style="background-image: url({{ asset('images/cosmos.webp') }});">
        <div class="mx-auto max-w-screen-xl px-6 py-32">
            <div class="text-left">
                <x-text.title class="text-white">PhysCore</x-text.title>
                <x-text.subtitle class="text-violet-600">Democratizando a ciência</x-text.subtitle>
                <x-text.desc class="text-white">Seu portal para artigos, apostilas, vídeos e muito mais!</x-text.desc>
                <div class="mt-8 gap-4">
                    <x-button.link class="shadow-lg" href="">Saiba mais!</x-button.link>
                </div>
            </div>
        </div>
    </section>
    <div class="hidden mx-auto pr-3 lg:flex justify-end max-w-screen-xl -mt-64 -mb-16">
        <img src="{{ asset('images/astronauta.webp') }}" class="h-96 transition hover:scale-105 hover:rotate-6">
    </div>

    <!-- Container Noticias -->
    <x-container.primary id="news">
        <livewire:HomeNoticias lazy/>
    </x-container.primary>

    <!-- Container Breve Introdução -->
    <x-container.primary class="text-center" id="about">
        <x-text.heading>Quem nós somos?</x-text.heading>
        <x-text.desc>Uma breve introdução ao projeto</x-text.desc>
        
        <iframe class="mt-12 w-full aspect-video rounded-lg shadow-lg" src="https://www.youtube.com/embed/"></iframe>
    </x-container.primary>

    <section class="bg-violet-800 text-white">
        <div class="mx-auto max-w-screen-xl px-6 py-16 grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <img class="rounded-lg shadow-lg" src="{{ asset('images/home/curso.jpg') }}">
            </div>
            <div class="flex items-center">
                <div>
                    <h2 class="text-4xl sm:text-5xl tracking-tight font-bold">Assista nossos cursos</h2>
                    <h6 class="text-xl mt-2">Você sabia que o PhysCore disponibiliza cursos gratuitos? Venha aprender já com a gente!</h6>
                    <div class="mt-8 gap-4">
                        <x-button.link-white class="text-black" href="">Saiba mais!</x-button.link-white>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-container.primary id="artigos">
        <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Artigos </h2>
        <h6 class="text-center text-xl mt-2">Achamos que você possa achar interessante esses artigos</h6>
        <livewire:HomeArtigos lazy />
        <div class="mt-12 gap-4 text-center">
            <x-button.link class="shadow-lg" href="{{ route('artigos.index') }}">Ver Mais Artigos</x-button.link>
        </div>  
    </x-container.primary>

    <section id="softwares" class="bg-zinc-900 text-gray-100">
        <div class="mx-auto max-w-screen-xl px-6 py-16">
            <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Softwares </h2>
            <h6 class="text-center text-xl mt-2">Acesso rápido aos nossos Softwares</h6>
            <livewire:HomeSoftwares lazy/>
        </div>
    </section>

    <section class="">
        <div class="mx-auto max-w-screen-xl px-6 py-16">
            <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Apostilas </h2>
            <h6 class="text-center text-xl mt-2">Acesso rápido a nossas apostilas</h6>
            <x-card.embreve/>
            {{--
            <div class="mt-12 gap-4 text-center">
                <x-button.link class="shadow-lg" href="">Ver Todas Apostilas</x-button.link>
            </div>
            --}}
        </div>
    </section>
</x-page-layout>