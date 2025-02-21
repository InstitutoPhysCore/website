@props(['icon'])

<li>
    <a href="/" class="flex items-center rounded-lg px-4 py-2 gap-2 transition hover:bg-zinc-800 w-full">
        <i class="{{ $icon }}"></i>
        {{ $slot }}
    </a>
</li>