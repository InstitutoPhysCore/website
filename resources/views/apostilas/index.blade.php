<x-page-layout>

    <section class="bg-fixed" style="background-image: url({{ asset('images/cosmos.webp') }});">
        <div class="mx-auto max-w-screen-xl px-6 py-32">
            <div class="text-center">
                <h1 class="text-5xl font-extrabold sm:text-7xl text-white"> Apostilas </h1>
                <p class="mt-4 sm:text-xl text-white"> Apostilas do PhysCore </p>
            </div>
        </div>
    </section>

    <livewire:Apostila.Categorias/>

    <livewire:Apostila.Index/>
    
</x-page-layout>