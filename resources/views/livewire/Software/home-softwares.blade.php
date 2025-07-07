

<div id="softwaresTable" class="mt-12 grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-8">

        @foreach ($softwares as $software)
            <a href="/software/{{ $software->id }}"><blockquote class="rounded-lg shadow transition bg-neutral-700 hover:bg-neutral-600/75 hover:scale-105 hover:shadow-xl">
                <div class="rounded-t-lg h-32 w-full bg-cover" style="background-image: url({{ asset('images/cosmos.webp') }});"></div>
                <div class="p-8">
                <p class="text-lg font-bold">{{ $software->title }}</p>
                <p class="mt-2">{{ $software->desc }}</p>
            </div>
        </blockquote></a>
    @endforeach
</div>

