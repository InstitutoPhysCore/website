@props(['titulo', 'subtitulo' => null])

<x-page-layout :title="$titulo">
    <x-hero :title="$titulo" :subtitle="$subtitulo"/>

    <x-container.primary class="max-w-screen-lg">
        <div class="prose max-w-none">
            {{ $slot }}
        </div>
    </x-container.primary>
</x-page-layout>
