@props(['href'])

<li>
    <a href="{{ $href }}" class="block py-2 px-3 transition-colors text-white rounded hover:bg-violet-900 lg:hover:bg-transparent lg:hover:text-violet-600 lg:p-0" aria-current="page">{{ $slot }}</a>
</li>