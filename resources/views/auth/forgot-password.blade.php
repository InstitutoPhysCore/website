<x-auth.card title="Esqueceu a senha?" text="Informe o seu e-mail e enviaremos um link para você cadastrar uma nova senha.">
    <form method="POST" action="{{ route('password.email') }}" class="grid gap-6">
        @csrf
        <div>
            <x-form.label for="Email"> Email </x-form.label>
            <x-form.input id="Email" name="email" type="email" :value="old('email')" required autofocus placeholder="Insira aqui seu email"/>
            <x-form.error :messages="$errors->get('email')"/>
        </div>
        <div class="flex items-center justify-between">
            <x-form.button>Enviar link</x-form.button>
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Voltar ao login</a>
        </div>
    </form>
</x-auth.card>
