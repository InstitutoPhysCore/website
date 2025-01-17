<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PhysCore</title>

    @env('vercel')
        <script src="https://cdn.tailwindcss.com"></script>
    @endenv

    @env('local')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endenv
</head>
<body class="dark:bg-zinc-800">

    <x-navbar/>

    <section class="bg-fixed" style="background-image: url({{ asset('images/cosmos.webp') }});">
        <div class="mx-auto max-w-screen-xl px-6 py-32">
            <div class="text-left">
                <h1 class="text-5xl font-extrabold sm:text-7xl text-white"> PhysCore </h1>
                <h2 class="text-2xl font-extrabold sm:text-4xl text-violet-600"> Democratizando a ciência </h2>
                <p class="mt-4 sm:text-xl text-white"> Seu portal para artigos, apostilas, vídeos e muito mais! </p>
                <div class="mt-8 gap-4">
                    <x-button.link class="shadow-lg" href="">Saiba mais!</x-button.link>
                </div>
            </div>
        </div>
    </section>
    <div class="hidden mx-auto pr-3 lg:flex justify-end max-w-screen-xl -mt-64 -mb-16">
        <img src="{{ asset('images/astronauta.webp') }}" class="h-96 transition hover:scale-105 hover:rotate-6">
    </div>

    <section class="">
        <div class="mx-auto max-w-screen-xl px-6 py-16">
            <div class="grid grid-cols-2 lg:grid-cols-4 grid-rows-2 gap-8 h-96">
                <a class="col-span-2 row-span-2 p-8 rounded-lg flex items-end shadow transition hover:scale-105 hover:shadow-xl" style="background-image: url({{ asset('images/cosmos.webp') }});">
                    <h3 class="text-white text-2xl font-bold">Noticias serão colocadas aqui.</h3>
                </a>

                <a class="col-span-2 p-8 rounded-lg flex items-end shadow transition hover:scale-105 hover:shadow-xl" style="background-image: url({{ asset('images/cosmos.webp') }});">
                    <h3 class="text-white text-2xl font-bold">Noticias serão colocadas aqui.</h3>
                </a>

                <a class="p-8 rounded-lg flex items-end shadow transition hover:scale-105 hover:shadow-xl" style="background-image: url({{ asset('images/cosmos.webp') }});">
                    <h3 class="text-white text-2xl font-bold">Noticias serão colocadas aqui.</h3>
                </a>

                <a class="p-8 rounded-lg flex items-end shadow transition hover:scale-105 hover:shadow-xl" style="background-image: url({{ asset('images/cosmos.webp') }});">
                    <h3 class="text-white text-2xl font-bold">Noticias serão colocadas aqui.</h3>
                </a>
            </div>
        </div>
    </section>

    <section class="">
        <div class="mx-auto max-w-screen-xl px-6 py-16 dark:text-white">
            <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Quem nós somos? </h2>
            <h3 class="text-center text-xl mt-2">Uma breve introdução ao nosso projeto</h6>
            <iframe class="mt-12 w-full aspect-video rounded-lg shadow-lg" src="https://www.youtube.com/embed/-6cH0Dwi-gI"></iframe>
        </div>
    </section>

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

    <section class="">
        <div class="mx-auto max-w-screen-xl px-6 py-16 dark:text-white">
            <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Artigos </h2>
            <h6 class="text-center text-xl mt-2">Achamos que você possa achar interessante esses artigos</h6>
            <div class="mt-12 grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-8">
                <a href="/"><blockquote class="rounded-lg shadow transition hover:bg-neutral-100/75 hover:scale-105 hover:shadow-xl">
                    <div class="rounded-t-lg h-32 w-full bg-cover" style="background-image: url({{ asset('images/cosmos.webp') }});"></div>
                    <div class="p-8">
                        <p class="text-lg font-bold">Lorem ipsum dolor sit amet.</p>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eleifend.</p>
                    </div>
                </blockquote></a>
            </div>
            <div class="mt-12 gap-4 text-center">
                <x-button.link class="shadow-lg" href="">Ver Mais Artigos</x-button.link>
            </div>
        </div>
    </section>

    <section id="softwares" class="bg-zinc-900 text-gray-100">
        <div class="mx-auto max-w-screen-xl px-6 py-16">
            <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Softwares </h2>
            <h6 class="text-center text-xl mt-2">Acesso rápido aos nossos Softwares</h6>
            <div class="mt-12 grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-8">
                <a href="/"><blockquote class="rounded-lg shadow transition bg-neutral-700 hover:bg-neutral-600/75 hover:scale-105 hover:shadow-xl">
                    <div class="rounded-t-lg h-32 w-full bg-cover" style="background-image: url({{ asset('images/cosmos.webp') }});"></div>
                    <div class="p-8">
                        <p class="text-lg font-bold">VACS
                            <span class="whitespace-nowrap rounded-full bg-blue-500 px-2.5 py-0.5 text-sm">Windows</span>
                        </p>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eleifend.</p>
                        </div>
                </blockquote></a>
            </div>
        </div>
    </section>

    <section class="">
        <div class="mx-auto max-w-screen-xl px-6 py-16">
            <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Apostilas </h2>
            <h6 class="text-center text-xl mt-2">Acesso rápido a nossas apostilas</h6>
            <div class="mt-12 grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-8">
                <a href="/"><blockquote class="rounded-lg shadow transition hover:bg-neutral-100/75 hover:scale-105 hover:shadow-xl">
                    <div class="rounded-t-lg h-32 w-full bg-cover" style="background-image: url({{ asset('images/cosmos.webp') }});"></div>
                    <div class="p-8">
                        <p class="text-lg font-bold">Apostilas Física</p>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eleifend.</p>
                    </div>
                </blockquote></a>
                <a href="/"><blockquote class="rounded-lg shadow transition hover:bg-neutral-100/75 hover:scale-105 hover:shadow-xl">
                    <div class="rounded-t-lg h-32 w-full bg-cover" style="background-image: url({{ asset('images/cosmos.webp') }});"></div>
                    <div class="p-8">
                        <p class="text-lg font-bold">Apostilas Quimica</p>
                        <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eleifend.</p>
                    </div>
                </blockquote></a>
            </div>
            <div class="mt-12 gap-4 text-center">
                <x-button.link class="shadow-lg" href="">Ver Todas Apostilas</x-button.link>
            </div>
        </div>
    </section>

    
    
    <x-footer/>

</body>
</html>