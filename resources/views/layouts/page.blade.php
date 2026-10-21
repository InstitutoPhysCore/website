@props(['bg' => null, 'title' => null, 'description' => null])
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ? $title.' · PhysCore' : 'PhysCore' }}</title>
    <meta name="description" content="{{ $description ?? 'PhysCore: democratizando a ciência para estudantes de todas as origens.' }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body class="bg-fixed"
@if($bg != null)
    style="background-image: url({{ asset($bg) }});"
@endif
>

    <!-- Navbar -->
    <x-navbar/>

    <!-- Conteúdo -->
    <main>
        {{ $slot }}
    </main>
    
    <!-- Footer -->
    <x-footer/>

    @livewireScripts
</body>
</html>
