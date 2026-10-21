@guest
    <div id="navbarLoginItem" class="items-center justify-between font-medium hidden w-full lg:flex lg:w-auto lg:order-1">
        <x-button.link href="{{ route('login') }}">Login</x-button.link>
    </div>
@endguest

@auth
<div id="navbarUserItem" x-data="{ open: false }" class="hidden font-medium lg:block lg:order-1">
    <button id="UserDropdownButton" type="button" @click="open = ! open" role="button" class="flex items-center py-2 px-3 hover:scale-105 transition text-white hover:bg-violet-900 lg:hover:bg-transparent lg:hover:text-violet-600 lg:p-0">
        <x-avatar :src="\App\Models\Concerns\HasCover::fileUrl(Auth::user()->avatar_url)" :name="Auth::user()->name" size="w-10 h-10"/>
        <p class="ms-2.5">Olá, {{ \Illuminate\Support\Str::before(Auth::user()->name, ' ') }}!</p>
    </button>
    <div id="UserDropdown" x-show="open" x-transition x-on:click.outside="open = false" class="z-10 absolute transition-opacity duration-300 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
        <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
        </div>
        <ul class="py-2 text-sm text-gray-700" aria-labelledby="UserDropdownButton">
            @if (Auth::user()->is_admin)
                <x-navbar.dropdown.item href="{{ url('/painel') }}">Painel</x-navbar.dropdown.item>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-navbar.dropdown.item href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Sair</x-navbar.dropdown.item>
            </form>
        </ul>
    </div>
</div>
@endauth
