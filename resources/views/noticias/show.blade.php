<x-page-layout bg="images/cosmos.webp">
    <x-container.primary class="rounded-lg my-12 !p-12 max-w-screen-lg bg-white">
        <div class="flex items-center gap-4">
            <img class="rounded-full object-cover w-16" src="{{ asset('images/equipe/nicolasferreira.jpg') }}"></img>
            <div>
                <h1 class="text-xl font-bold">Nicolas Ferreira</h1>
                <h6 class="text-sm">Desenvolvedor Web</h6>
            </div>
        </div>
        <h1 class="mt-6 text-5xl font-bold tracking-tight sm:text-6xl">{{ $artigo->title }}</h1>
        <h6 class="text-xl mt-2">{{ $artigo->desc}}</h6>
        <div class="mt-12">
            <?php
            echo Str::markdown($artigo->content);
            ?>
        </div>
    </x-container.primary>
</x-page-layout>