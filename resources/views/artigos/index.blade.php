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

    <livewire:showArtigos/>
    
    @livewireScripts
    
    <x-footer/>

</body>
</html>