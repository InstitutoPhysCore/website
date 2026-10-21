@props(['title', 'subtitle' => null])

<section class="bg-fixed bg-cover" style="background-image: url({{ asset('images/cosmos.webp') }});">
    <div class="mx-auto max-w-screen-xl px-6 py-24 sm:py-32">
        <div class="text-center">
            <h1 class="text-4xl font-extrabold sm:text-7xl text-white">{{ $title }}</h1>
            @if ($subtitle)
                <p class="mt-4 sm:text-xl text-white">{{ $subtitle }}</p>
            @endif
        </div>
    </div>
</section>
