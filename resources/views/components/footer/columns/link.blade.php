@props(['href' => '#'])

<li>
    <a {{ $attributes->merge(['class' => 'text-gray-400 transition hover:opacity-75']) }} href="{{ $href }}">{{ $slot }}</a>
</li>