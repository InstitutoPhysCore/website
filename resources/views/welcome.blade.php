<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @env('vercel')
        <script src="https://cdn.tailwindcss.com"></script>
    @endenv

    @env('local')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endenv
</head>
<body>

    <x-navbar/>

    <section class="relative bg-fixed" style="background-image: url(https://images.unsplash.com/photo-1496184310182-0a481fbac296?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
        <div class="mx-auto max-w-screen-xl px-4 py-24">
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
    
    <x-footer/>

</body>
</html>