<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel de Controle - PhysCore</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex">

    <!-- Navbar -->
    <x-painel.sidebar/>

    <!-- Conteúdo -->
    <main class="">
        {{ $slot }}
    </main>
    
    <!-- Footer -->

</body>
</html>