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

    <section class="">
        <div class="mx-auto max-w-screen-xl px-6 py-16 dark:text-white">
            <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Secretaria de Software </h2>
            <h6 class="text-center text-xl mt-2">Membros da Secretaria de Software</h6>
            <div class="mt-12 grid grid-cols-1 gap-4 md:grid-cols-4 md:gap-8">
                <a href="/equipe/membro"><blockquote class="transition hover:scale-105">
                    <div class="flex justify-center">
                        <div class="rounded-full h-32 w-32 bg-cover" style="background-image: url({{ asset('images/equipe/nicolasferreira.jpg') }});"></div>
                    </div>

                    <div class="p-4 w-full text-center">
                        <p class="text-lg font-bold">Nicolas Ferreira</p>
                        <p class="mt-2">Desenvolvedor Web</p>
                    </div>
                </blockquote></a>
            </div>
        </div>
    </section>


    
    
    <x-footer/>

</body>
</html>