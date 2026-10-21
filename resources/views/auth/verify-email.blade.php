<x-auth.card title="Verifique o seu e-mail" text="Antes de continuar, confirme o seu endereço clicando no link que enviamos por e-mail. Se não recebeu, podemos enviar outro.">
    <div class="flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-form.button>Reenviar e-mail</x-form.button>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-gray-700 underline">Sair</button>
        </form>
    </div>
</x-auth.card>
