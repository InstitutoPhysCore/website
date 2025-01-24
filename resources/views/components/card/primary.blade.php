@props(['title', 'img_src'])

{{-- Card primário --}}
<a><blockquote class="rounded-lg shadow transition hover:bg-neutral-100/75 hover:scale-105 hover:shadow-xl">
    <div class="rounded-t-lg h-32 w-full bg-cover" style="background-image: url({{ $img_src }});"></div>
    <div class="p-8">
        <p class="text-lg font-bold">{{ $title }}</p>
        <p class="mt-2">{{ $slot }}</p>
    </div>
</blockquote></a>