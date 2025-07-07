<section class="categorias">
    <x-container.primary>
        <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Categorias </h2>
        <h6 class="text-center text-xl mt-2">Acesse os cursos de cada categoria</h6>
        @if ($categorias->count())
            
        <div class="mt-12 grid grid-cols-1 gap-4 md:grid-cols-4 md:gap-8">
            @foreach ($categoria as $categorias)
            <a href="/"><blockquote class="transition hover:scale-105">
                <div class="flex justify-center">
                    <div class="rounded-full h-32 w-32 bg-cover" style="background-image: url({{ asset('images/cosmos.webp') }});"></div>
                </div>

                <div class="p-4 w-full text-center">
                    <p class="text-lg font-bold">{{ $categoria->name }}</p>
                    <p class="mt-2">{{ $categoria->desc }}</p>
                </div>
            </blockquote></a>
            @endforeach      
        </div>
        @else
            <p class="text-center mt-12 text-sm opacity-75">Não foi possivel encontrar nenhuma categoria</p>
        @endif
    </x-container.primary>
</section>