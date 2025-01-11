@props(['href'])

<li>
    <a href="{{ $href }}" class="block py-2 px-3 transition-colors text-white rounded hover:bg-violet-900 md:hover:bg-transparent md:hover:text-violet-600 md:p-0" aria-current="page">{{ $slot }}</a>
</li>