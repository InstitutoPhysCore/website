<nav class="bg-zinc-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        
        <!-- Título Navbar -->
        <x-navbar.title/>
        
        <!-- Dropdown Navbar Mobile -->
        <x-navbar.mobile/>

        <div id="navbarItems" class="items-center justify-between font-medium hidden w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col p-6 md:p-0 mt-4 rounded-lg bg-zinc-800 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-zinc-900">
                <!-- Link Página Principal -->
                <x-navbar.link href="">Página Inicial</x-navbar.link>

                <!-- Dropdown Sobre -->
                <x-navbar.dropdown title="Sobre">
                    <x-navbar.dropdown.item href="">Quem somos?</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="">História</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="">Objetivos</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="">Equipe</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="">Diretoria</x-navbar.dropdown.item>
                </x-navbar.dropdown>

                <!-- Link Artigos -->
                <x-navbar.link href="">Artigos</x-navbar.link>

                <!-- Link Notícias -->
                <x-navbar.link href="">Notícias</x-navbar.link>

                <!-- Dropdown Ações -->
                <x-navbar.dropdown title="Ações">
                    <x-navbar.dropdown.item href="">Apresentações</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="">Projetos</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="">Ações Sociais</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="">Iniciação Científica</x-navbar.dropdown.item>
                </x-navbar.dropdown>

                <!-- Dropdown Ensino -->
                <x-navbar.dropdown title="Ensino">
                    <x-navbar.dropdown.item href="">Cursos</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="">Apostilas</x-navbar.dropdown.item>
                    <x-navbar.dropdown.item href="">Biblioteca</x-navbar.dropdown.item>
                </x-navbar.dropdown>

                <!-- Dropdown Softwares -->
                <x-navbar.link href="#softwares">Softwares</x-navbar.link>
            </ul>

            <!-- Menu Usuário Mobile -->
            <x-navbar.user-mobile/>
        </div>

        <!-- Menu Usuário Desktop -->
        <x-navbar.user/>

    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
