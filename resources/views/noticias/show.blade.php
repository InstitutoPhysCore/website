<x-page-layout bg="images/cosmos.webp">
    <x-container.primary class="rounded-lg my-12 !p-12 max-w-screen-lg bg-white">
        <div class="flex items-center gap-4">
            <img class="rounded-full object-cover w-16" src="{{ asset('images/equipe/nicolasferreira.jpg') }}"></img>
            <div>
                <h1 class="text-xl font-bold">{{ $noticia->author->name }}</h1>
                <h6 class="text-sm">{{ $noticia->author->function }}</h6>
            </div>
        </div>
        <h1 class="mt-6 text-5xl font-bold tracking-tight sm:text-6xl">{{ $noticia->title }}</h1>
        <h6 class="text-xl mt-2">{{ $noticia->desc}}</h6>
        <div class="mt-12">
            <?php
            echo Str::markdown($noticia->content);
            ?>
        </div>
    </x-container.primary>
</x-page-layout>