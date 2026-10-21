@props(['href', 'cover', 'title', 'meta' => null, 'dark' => false])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'group block h-full overflow-hidden rounded-lg shadow transition hover:-translate-y-1 hover:shadow-xl focus:outline-none focus:ring '.($dark ? 'bg-neutral-700 hover:bg-neutral-600/75' : 'bg-white hover:bg-neutral-50')]) }}>
    <div class="h-40 w-full bg-cover bg-center" style="background-image: url('{{ $cover }}');" role="img" aria-label="Capa de {{ $title }}"></div>
    <div class="p-6">
        @if ($meta)
            <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-violet-500">{{ $meta }}</p>
        @endif
        <p class="text-lg font-bold">{{ $title }}</p>
        <p class="mt-2 text-sm opacity-80">{{ $slot }}</p>
    </div>
</a>
