<aside class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-auto bg-zinc-900 text-white px-6 lg:static font-medium lg:translate-x-0">
	<div class="my-6">
		<!-- Header -->
		<a href="/" class="flex justify-center items-center space-x-3 hover:scale-105 transition">
			<img src="{{ asset('images/astronauta.webp') }}" class="w-10"/>
    		<span class="self-center text-2xl font-semibold whitespace-nowrap text-white">PhysCore</span>
		</a>
	</div>

	<hr class="h-0.5 border-t-0 bg-zinc-800" />

	<ul class="my-6">
		<!-- Link -->
		<x-painel.sidebar.link icon="fa-solid fa-gauge">Dashboard</x-painel.sidebar.link>
	</ul>

	<hr class="h-0.5 border-t-0 bg-zinc-800" />

	<ul class="my-6 space-y-3">
		<!-- Link -->
		<x-painel.sidebar.link icon="fa-solid fa-gauge">Artigos</x-painel.sidebar.link>
		<x-painel.sidebar.link icon="fa-solid fa-gauge">Noticias</x-painel.sidebar.link>
		<x-painel.sidebar.link icon="fa-solid fa-gauge">Softwares</x-painel.sidebar.link>
		<x-painel.sidebar.link icon="fa-solid fa-gauge">Apostilas</x-painel.sidebar.link>
		<x-painel.sidebar.link icon="fa-solid fa-gauge">Cursos</x-painel.sidebar.link>
		<x-painel.sidebar.link icon="fa-solid fa-gauge">Biblioteca</x-painel.sidebar.link>

	</ul>

	<hr class="h-0.5 border-t-0 bg-zinc-800" />

	<ul class="my-6 space-y-3">

		<!-- Dropdown -->
		<x-painel.sidebar.dropdown title="Nicolas">
			<x-painel.sidebar.dropdown.item href="">Bunga</x-painel.sidebar.dropdown.item>
		</x-painel.sidebar.dropdown>
	
	</ul>
</aside>
