<div class="lg:hidden transition">
    <div class="flex p-6 rounded-lg justify-between items-center bg-zinc-800 mt-4">
        @auth
        <div class="flex items-center">
            <x-avatar :src="\App\Models\Concerns\HasCover::fileUrl(Auth::user()->avatar_url)" :name="Auth::user()->name" size="w-10 h-10"/>
            <span class="text-gray-100 ml-3">{{ Auth::user()->name }}</span>
        </div>

        <div class="flex items-center gap-4">
            @if (Auth::user()->is_admin)
                <a href="{{ url('/painel') }}" class="text-gray-100 text-sm hover:text-violet-600">Painel</a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="text-gray-100 text-lg hover:text-violet-600" title="Sair" aria-label="Sair">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
        @endauth
        @guest
        <x-button.link href="{{ route('login') }}">Login</x-button.link>
        @endguest
    </div>
</div>
