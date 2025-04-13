@props(['title', 'desc', 'cover'])

<a {{ $attributes->merge(['class' => 'p-8 rounded-lg cursor-pointer flex items-end shadow transition hover:scale-105 hover:shadow-xl']) }} style="background-image: url({{ asset($cover) }});">
    <h3 class="text-white text-2xl font-bold">{{ $title }}</h3>
</a>