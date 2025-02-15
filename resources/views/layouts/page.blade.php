<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PhysCore</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
 
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body>

    <!-- Navbar -->
    <x-navbar/>

    <!-- Conteúdo -->
    <main>
        {{ $slot }}
    </main>
    
    <!-- Footer -->
    <x-footer/>

</body>
</html>