<nav class="bg-zinc-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <x-navbar.title/>
        
        <x-navbar.mobile/>

        <div id="navbarItems" class="items-center justify-between font-medium hidden w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col p-4 md:p-0 mt-4 rounded-lg bg-zinc-800 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-zinc-900">
                <x-navbar.link href="">Nome</x-navbar.link>

                <x-navbar.dropdown title="Sobre">
                    <x-navbar.dropdown.item href="/oi">Link</x-navbar.dropdown.item>
                </x-navbar.dropdown>

                <x-navbar.dropdown.menu.button>Ações</x-navbar.dropdown.menu.button>

                <x-navbar.dropdown title="Ensino">
                    <x-navbar.dropdown.item href="/oi">Link</x-navbar.dropdown.item>
                </x-navbar.dropdown>

                <x-navbar.link href="">Softwares</x-navbar.link>
            </ul>

            <div class="md:hidden transition">
                <div class="flex p-4 rounded-lg justify-between items-center bg-zinc-800 mt-4">
                    <a href="#" class="block py-2 px-3 text-gray-100 rounded hover:bg-violet-900" aria-current="page">
                        <div class="flex items-center justify-around">
                                <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                    <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                </div>
                            <span class="text-gray-100 ml-3">Usuário</span>
                        </div>
                    </a>

                    <form class="px-3">
                        <button class="text-gray-100 text-lg hover:text-violet-600">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div id="navbarUserItem" class="items-center justify-between font-medium hidden w-full md:flex md:w-auto md:order-1">
            <x-navbar.user/>
        </div>



    </div>

    <x-navbar.dropdown.menu name="Projetos">
        <x-navbar.dropdown.menu.card title="Copos">Informação</x-navbar.dropdown.menu.card>
    </x-navbar.dropdown.menu>

</nav>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
