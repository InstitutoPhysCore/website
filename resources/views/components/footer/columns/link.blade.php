@props(['href' => '#'])

<li>
    <a class="text-gray-700 transition hover:text-gray-700/75" href="{{ $href }}">{{ $slot }}</a>
</li>