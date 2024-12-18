<nav class="bg-zinc-900 fixed w-full z-20 top-0 start-0">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <x-navbar.title/>
        
        <x-navbar.mobile/>

        <div id="navbarItems" class="items-center justify-between font-medium hidden w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col p-4 md:p-0 mt-4 rounded-lg bg-zinc-800 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-zinc-900">
                <x-navbar.link href="">Nome</x-navbar.link>

                <x-navbar.dropdown title="Sobre">
                    <x-navbar.dropdown.item href="/oi">Link</x-navbar.dropdown.item>
                </x-navbar.dropdown>

                <x-navbar.dropdown.menu.button>Projetos</x-navbar.dropdown.menu.button>
            </ul>

            <div class="md:hidden">
                <span class="text-white">Área de Login</span>
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
