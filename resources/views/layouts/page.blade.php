@props(['bg' => null])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PhysCore</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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

</body>
</html>