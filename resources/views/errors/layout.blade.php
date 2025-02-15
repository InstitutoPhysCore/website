<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="grid h-screen place-content-center px-4 bg-zinc-900">
        <div class="text-center">
            <h1 class="text-9xl font-black text-gray-500/50">@yield('code')</h1>
      
            <p class="text-2xl font-bold tracking-tight sm:text-4xl text-white">@yield('header')</p>
      
            <p class="mt-4 mb-4 text-gray-400">@yield('message')</p>
      
            <x-button.link href="">Voltar ao Início</x-button.link>
        </div>
    </div>
</body>
</html>
