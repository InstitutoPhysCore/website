<x-page-layout>
    <!-- Container Noticias -->
    <x-container.primary id="news">
        <x-text.heading class="text-center mb-12">Principais Notícias</x-text.heading>
        <livewire:HomeNoticias lazy/>
    </x-container.primary>

    <x-container.primary>
        <x-text.heading class="text-center">Mais Recentes</x-text.heading>
        <livewire:ShowNoticias lazy/>
    </x-container.primary>
</x-page-layout>