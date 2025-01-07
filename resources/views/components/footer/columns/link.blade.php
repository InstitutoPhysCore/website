@props(['href' => '#'])

<li>
    <a class="text-gray-400 transition hover:opacity-75" href="{{ $href }}">{{ $slot }}</a>
</li>