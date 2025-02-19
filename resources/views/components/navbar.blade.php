<nav class="bg-zinc-900">
    <div x-data="{toggle: false}" class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        
        <!-- Título Navbar -->
        <x-navbar.title/>
        
        <!-- Dropdown Navbar Mobile -->
        <x-navbar.mobile/>

        <div x-show="toggle" id="navbarItems" class="items-center justify-between font-medium w-full lg:flex lg:w-auto lg:order-1">
            <ul class="flex flex-col p-6 lg:p-0 mt-4 rounded-lg bg-zinc-800 lg:space-x-8 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 lg:bg-zinc-900">
                <!-- Link Página Principal -->
                <x-navbar.link href="/">Página Inicial</x-navbar.link>

                <!-- Dropdown Sobre -->
                <x-navbar.dropdown title="Sobre">
                    <x-navbar.dropdown.item href="{{ route('page.quemsomos') }}">Quem somos?</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="{{ route('page.objetivos') }}">Objetivos</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="{{ route('equipe.index') }}">Equipe</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="">Diretoria</x-navbar.dropdown.item>
                </x-navbar.dropdown>

                <!-- Link Artigos -->
                <x-navbar.link href="{{ route('artigos.index') }}">Artigos</x-navbar.link>

                <!-- Link Notícias -->
                <x-navbar.link href="{{ route('noticias.index') }}">Noticias</x-navbar.link>

                <!-- Dropdown Ações -->
                <x-navbar.dropdown title="Ações">
                    <x-navbar.dropdown.item href="{{ route('page.apresentacoes') }}">Apresentações</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="{{ route('page.projetos') }}">Projetos</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="{{ route('page.acoes') }}">Ações Sociais</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="{{ route('page.iniciacao') }}">Iniciação Científica</x-navbar.dropdown.item>
                </x-navbar.dropdown>

                <!-- Dropdown Ensino -->
                <x-navbar.dropdown title="Ensino">
                    <x-navbar.dropdown.item href="{{ route('cursos.index') }}">Cursos</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="{{ route('apostilas.index') }}">Apostilas</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="{{ route('biblioteca.index') }}">Biblioteca</x-navbar.dropdown.item>
                </x-navbar.dropdown>

                <!-- Dropdown Softwares -->
                <x-navbar.link href="{{ route('softwares.index') }}">Softwares</x-navbar.link>
            </ul>

            <!-- Menu Usuário Mobile -->
            <x-navbar.user-mobile/>
        </div>

        <!-- Menu Usuário Desktop -->
        <x-navbar.user/>

    </div>
</nav>
