@props(['membro', 'diretor' => false])

<a href="{{ route('equipe.show', $membro) }}" class="block transition hover:scale-105">
    <div class="flex justify-center">
        <x-avatar :src="$membro->avatar_src" :name="$membro->name" size="w-32 h-32 text-3xl"/>
    </div>
    <div class="p-4 w-full text-center">
        <p class="text-lg font-bold">{{ $membro->name }}</p>
        <p class="mt-2">{{ $diretor ? 'Diretor(a) da Secretaria' : $membro->function }}</p>
    </div>
</a>
