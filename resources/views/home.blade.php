<x-page-layout>
    <section class="bg-fixed" style="background-image: url({{ asset('images/cosmos.webp') }});">
        <div class="mx-auto max-w-screen-xl px-6 py-32">
            <div class="text-left">
                <x-text.title class="text-white">PhysCore</x-text.title>
                <x-text.subtitle class="text-violet-600">Democratizando a ciência</x-text.subtitle>
                <x-text.desc class="text-white">Seu portal para artigos, apostilas, vídeos e muito mais!</x-text.desc>
                <div class="mt-8 gap-4">
                    <x-button.link class="shadow-lg" href="{{ route('page.quemsomos') }}">Saiba mais!</x-button.link>
                </div>
            </div>
        </div>
    </section>
    <div class="hidden mx-auto pr-3 lg:flex justify-end max-w-screen-xl -mt-64 -mb-16">
        <img src="{{ asset('images/astronauta.webp') }}" alt="" class="h-96 transition hover:scale-105 hover:rotate-6">
    </div>

    <!-- Container Noticias -->
    <x-container.primary id="news">
        <x-text.heading class="text-center mb-12">Notícias</x-text.heading>
        <livewire:noticia.home lazy/>
        <div class="mt-12 text-center">
            <x-button.link class="shadow-lg" href="{{ route('noticias.index') }}">Ver Todas as Notícias</x-button.link>
        </div>
    </x-container.primary>

    <!-- Container Breve Introdução -->
    <x-container.primary class="text-center" id="about">
        <x-text.heading>Quem nós somos?</x-text.heading>
        <x-text.desc>Uma breve introdução ao projeto</x-text.desc>

        @if (config('physcore.intro_video'))
            <iframe class="mt-12 w-full aspect-video rounded-lg shadow-lg" src="https://www.youtube-nocookie.com/embed/{{ config('physcore.intro_video') }}" title="Apresentação do PhysCore" allowfullscreen loading="lazy"></iframe>
        @else
            <div class="mt-8"><x-button.link href="{{ route('page.quemsomos') }}">Conheça o projeto</x-button.link></div>
        @endif
    </x-container.primary>

    <section class="bg-violet-800 text-white">
        <div class="mx-auto max-w-screen-xl px-6 py-16 grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <img class="rounded-lg shadow-lg" src="{{ asset('images/home/curso.jpg') }}" alt="Alunos assistindo a um curso">
            </div>
            <div class="flex items-center">
                <div>
                    <h2 class="text-4xl sm:text-5xl tracking-tight font-bold">Assista nossos cursos</h2>
                    <h6 class="text-xl mt-2">Você sabia que o PhysCore disponibiliza cursos gratuitos? Venha aprender já com a gente!</h6>
                    <div class="mt-8 gap-4">
                        <x-button.link-white class="text-black" href="{{ route('cursos.index') }}">Ver cursos</x-button.link-white>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-container.primary id="artigos">
        <x-text.heading class="text-center">Artigos</x-text.heading>
        <x-text.desc class="text-center">Achamos que você possa achar interessante esses artigos</x-text.desc>
        <livewire:destaques tipo="artigos" lazy/>
        <div class="mt-12 gap-4 text-center">
            <x-button.link class="shadow-lg" href="{{ route('artigos.index') }}">Ver Mais Artigos</x-button.link>
        </div>
    </x-container.primary>

    <section id="softwares" class="bg-zinc-900 text-gray-100">
        <div class="mx-auto max-w-screen-xl px-6 py-16">
            <x-text.heading class="text-center">Softwares</x-text.heading>
            <x-text.desc class="text-center">Acesso rápido aos nossos Softwares (é preciso estar logado)</x-text.desc>
            <livewire:destaques tipo="softwares" :escuro="true" lazy/>
            <div class="mt-12 gap-4 text-center">
                <x-button.link-white class="text-black" href="{{ route('softwares.index') }}">Ver Todos os Softwares</x-button.link-white>
            </div>
        </div>
    </section>

    <x-container.primary id="apostilas">
        <x-text.heading class="text-center">Apostilas</x-text.heading>
        <x-text.desc class="text-center">Acesso rápido a nossas apostilas</x-text.desc>
        <livewire:destaques tipo="apostilas" lazy/>
        <div class="mt-12 gap-4 text-center">
            <x-button.link class="shadow-lg" href="{{ route('apostilas.index') }}">Ver Todas as Apostilas</x-button.link>
        </div>
    </x-container.primary>
</x-page-layout>
