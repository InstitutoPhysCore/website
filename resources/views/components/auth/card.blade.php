@props(['title', 'text' => null])

<x-auth-layout>
    <div class="flex min-h-screen items-center justify-center bg-zinc-900 px-6 py-12">
        <div class="w-full max-w-md rounded-lg bg-white p-8 shadow-xl">
            <a href="{{ route('home') }}" class="inline-flex size-16 items-center justify-center rounded-full bg-violet-900">
                <span class="sr-only">Página inicial</span>
                <img class="h-10" src="{{ asset('images/astronauta.webp') }}" alt=""/>
            </a>
            <h1 class="mt-4 text-2xl font-bold text-gray-900">{{ $title }}</h1>
            @if ($text)
                <p class="mt-2 text-sm leading-relaxed text-gray-500">{{ $text }}</p>
            @endif
            @if (session('status'))
                <p class="mt-4 text-sm font-medium text-green-600">{{ session('status') == 'verification-link-sent' ? 'Um novo link de verificação foi enviado para o seu e-mail.' : session('status') }}</p>
            @endif
            <div class="mt-6">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-auth-layout>
