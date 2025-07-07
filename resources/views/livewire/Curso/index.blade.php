<x-container.primary id="aulas">
    <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl"> Todos os Cursos </h2>
    <h6 class="text-center text-xl mt-2">Acesse todos os nossos cursos</h6>
            <div class="mt-12">
                <p class="font-bold text-lg mb-2">Filtros</p>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <x-form.label for="Search"> Pesquisar </x-form.label>

                        <x-form.input 
                            wire:model.live="searchTerm"
                            id="Search" name="Search" type="text"
                            placeholder="Pesquisar"
                        />
                    </div>
                    <div>
                        <x-form.label for="Categoria"> Categoria </x-form.label>
                  
                        <select
                            wire:model="categoria"
                            name="Categoria"
                            id="Categoria"
                            class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm"
                        >
                            <option>Todas as Categorias</option>
                        </select>
                    </div>
                    <div>
                        <x-form.label for="Classificacao"> Classificação </x-form.label>
                  
                        <select
                            wire:model.live="sortOrder"
                            name="sortOrder"
                            id="Classificacao"
                            class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm"
                        >
                            <option value="desc">Mais Recentes</option>
                            <option value="asc">Mais Antigos</option>
                        </select>
                    </div>
                </div>
            </div>

            @if($series->count())
                <div id="seriesTable" class="mt-12 grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-8">

                    @foreach ($series as $serie)
                        <a href="/series/{{ $serie->id }}"><blockquote class="rounded-lg shadow transition hover:bg-neutral-100/75 hover:scale-105 hover:shadow-xl">
                            <div class="rounded-t-lg h-32 w-full bg-cover" style="background-image: url({{ asset('images/cosmos.webp') }});"></div>
                            <div class="p-8">
                                <p class="text-lg font-bold">{{ $serie->title }}</p>
                                <p class="mt-2">{{ $serie->desc }}</p>
                            </div>
                        </blockquote></a>
                    @endforeach

                </div>
            @else
                <p class="text-center mt-12 text-sm opacity-75">Não foi possivel encontrar nenhuma serie que correspondesse a sua pesquisa</p>
            @endif

            <div class="mt-12 gap-4 text-center">
                {{ $series->links(data: ['scrollTo' => '#seriesTable']) }}
            </div>
        
</x-container.primary>