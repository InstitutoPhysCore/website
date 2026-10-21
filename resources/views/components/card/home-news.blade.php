@props(['title', 'cover', 'href'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'relative min-h-48 p-6 rounded-lg flex items-end bg-cover bg-center overflow-hidden shadow transition hover:scale-[1.02] hover:shadow-xl']) }} style="background-image: url('{{ $cover }}');">
    <span class="absolute inset-0 bg-gradient-to-t from-black/80 to-black/10"></span>
    <h3 class="relative text-white text-xl sm:text-2xl font-bold">{{ $title }}</h3>
</a>
