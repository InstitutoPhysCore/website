<x-page-layout>
    <!-- Container Noticias -->
    <x-container.primary id="news">
        <x-text.heading class="text-center">Principais Notícias</x-text.heading>
        <div class="mt-12 grid grid-cols-2 lg:grid-cols-4 gap-8 h-96">
            <x-card.home-news class="col-span-2 lg:row-span-2"/>

            <x-card.home-news class="col-span-2 lg:row-span-1"/>

            <x-card.home-news/>

            <x-card.home-news/>
        </div>
    </x-container.primary>

    <x-container.primary>
        <x-text.heading class="text-center">Mais Recentes</x-text.heading>
        <livewire:ShowNoticias lazy/>
    </x-container.primary>
</x-page-layout>