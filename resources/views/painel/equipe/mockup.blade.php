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

        <section class="mx-auto max-w-screen-xl px-6 py-16">
            <div class="flex items-center gap-8">
                <img class="rounded-full object-cover w-48" src="{{ asset('images/equipe/nicolasferreira.jpg') }}"></img>
                <div>
                    <h1 class="text-5xl font-bold">Nicolas Ferreira</h1>
                    <h6 class="text-xl">Desenvolvedor Web</h6>
                    <div class="mt-4 flex gap-4">
                        <span class="whitespace-nowrap rounded-full text-white font-bold bg-blue-500 px-2.5 py-0.5 text-sm">Software</span>
                        <span class="whitespace-nowrap rounded-full text-white font-bold bg-violet-800 px-2.5 py-0.5 text-sm">Website</span>
                    </div>
                    <ul class="mt-4 flex justify-center gap-6 sm:justify-start md:gap-8">
                        <li>
                            <a href="" rel="noreferrer" target="_blank" class="text-zinc-900 transition hover:text-violet-600">
                                <span class="sr-only">Instagram</span>
                                <i class="text-2xl fa-brands fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="">
            <div class="mx-auto max-w-screen-xl px-6 py-16 dark:text-white">
                <h2 class="text-2xl font-bold tracking-tight sm:text-4xl"> Sobre </h2>
                <p class="mt-4 text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam euismod magna ut dolor lacinia, vestibulum interdum nisi placerat. Fusce nunc diam, accumsan in sapien nec, blandit commodo lorem. Cras id quam mauris. Aenean sit amet dignissim nunc. Duis suscipit nulla vitae pretium imperdiet. Aliquam id arcu sed odio sollicitudin pretium. Cras ornare nisi a bibendum porta.

                    Morbi maximus nisi vel mauris condimentum, non tempus nisl scelerisque. Sed euismod mauris et urna varius placerat. Phasellus vulputate vehicula maximus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut nec laoreet felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis rhoncus lorem et erat luctus, ac faucibus nisi faucibus. Mauris eget velit justo. Nunc ac ligula ac libero tempor ultricies ut eu libero. Nunc lacus nulla, vestibulum vel iaculis id, egestas pellentesque est. Maecenas eu cursus arcu. Maecenas imperdiet vestibulum elementum. Pellentesque lacinia bibendum mauris ac pellentesque.
                    
                    Phasellus tempor nisi eget ligula finibus convallis. Sed ut mauris vestibulum, rhoncus mauris et, placerat lorem. Morbi quis viverra nunc, id tempus dolor. Aenean varius rhoncus viverra. Vivamus lacus ligula, laoreet sed mauris ut, condimentum viverra ex. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum in tortor quis enim cursus varius. Donec imperdiet, leo at aliquam pretium, sapien diam vulputate erat, quis fermentum nisl nunc eu ligula. Morbi eget elit quis nibh tempor iaculis et quis risus. Aenean nunc libero, commodo non velit in, elementum laoreet velit. Praesent fringilla placerat sem in suscipit.</h6>
            </div>
        </section>

        <section class="">
            <div class="mx-auto max-w-screen-xl px-6 py-16 dark:text-white">
                <h2 class="text-2xl font-bold tracking-tight sm:text-4xl"> Contribuições de Nicolas </h2>
                <h6 class="text-xl mt-2">Contribuições ao projeto de Nicolas Ferreira</h6>
    
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
                            <p class="text-lg font-bold">Projeto Website</p>
                            <p class="mt-2">Desenvolvimento do backend e do frontend do site do projeto</p>
                        </div>
                    </blockquote></a>
                </div>
                <div class="mt-12 gap-4 text-center">
                    <x-button.link class="shadow-lg" href="">Carregar Mais Contribuições</x-button.link>
                </div>
            </div>
        </section>


    
    
    <x-footer/>

</body>
</html>