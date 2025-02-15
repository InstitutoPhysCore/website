<div class="lg:hidden transition">
    <div class="flex p-6 rounded-lg justify-between items-center bg-zinc-800 mt-4">
        @auth
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
        @endauth
        @guest
        <x-button.link href="">Login</x-button.link>
        @endguest
    </div>
</div>