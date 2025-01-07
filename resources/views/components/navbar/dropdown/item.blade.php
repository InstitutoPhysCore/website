@props(['href' => '#'])

<li>
    <a href="{{ $href }}" class="block px-4 py-2 transition hover:bg-gray-100">{{$slot}}</a>
</li>