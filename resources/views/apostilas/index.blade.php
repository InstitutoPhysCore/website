<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <x-navbar/>

    <section class="bg-fixed" style="background-image: url({{ asset('images/cosmos.webp') }});">
        <div class="mx-auto max-w-screen-xl px-6 py-32">
            <div class="text-center">
                <h1 class="text-5xl font-extrabold sm:text-7xl text-white"> Artigos </h1>
                <p class="mt-4 sm:text-xl text-white"> Artigos cientificos do PhysCore </p>
            </div>
        </div>
    </section>

    @guest
        <x-section.restrict/>
    @endguest

    @auth
    <section class="">
        <div class="mx-auto max-w-screen-xl px-6 py-16 dark:text-white">
            <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Categorias </h2>
            <h6 class="text-center text-xl mt-2">Acesse os artigos de cada categoria</h6>
            <div class="mt-12 grid grid-cols-1 gap-4 md:grid-cols-4 md:gap-8">
                <a href="/"><blockquote class="transition hover:scale-105">
                    <div class="flex justify-center">
                        <div class="rounded-full h-32 w-32 bg-cover" style="background-image: url({{ asset('images/cosmos.webp') }});"></div>
                    </div>

                    <div class="p-4 w-full text-center">
                        <p class="text-lg font-bold">Física</p>
                        <p class="mt-2">Artigos em física</p>
                    </div>
                </blockquote></a>
            </div>
        </div>
    </section>

    <section class="">
        <div class="mx-auto max-w-screen-xl px-6 py-16 dark:text-white">
            <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Todos os Artigos </h2>
            <h6 class="text-center text-xl mt-2">Todos os artigos do PhysCore</h6>

            <div class="mt-12">
                <p class="font-bold text-lg mb-2">Filtros</p>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label for="Categoria" class="block text-sm font-medium text-gray-900"> Categoria </label>
                  
                        <select
                            name="Categoria"
                            id="Categoria"
                            class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm"
                        >
                            <option value="">Todas as Categorias</option>
                        </select>
                    </div>
                    <div>
                        <label for="Classificacao" class="block text-sm font-medium text-gray-900"> Classificação </label>
                  
                        <select
                            name="Classificacao"
                            id="Classificacao"
                            class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm"
                        >
                            <option value="">Mais Relevantes</option>
                            <option value="">Mais Recentes</option>
                            <option value="">Mais Antigos</option>
                        </select>
                    </div>
                </div>
            </div>

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
                <x-button.link class="shadow-lg" href="">Carregar Mais Artigos</x-button.link>
            </div>
        </div>
    </section>

    @endauth

    
    
    <x-footer/>

</body>
</html>