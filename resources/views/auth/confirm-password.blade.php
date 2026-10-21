<x-auth.card title="Confirme a sua senha" text="Esta é uma área segura. Confirme a sua senha antes de continuar.">
    <form method="POST" action="{{ route('password.confirm') }}" class="grid gap-6">
        @csrf
        <div>
            <x-form.label for="Password"> Senha </x-form.label>
            <x-form.input id="Password" name="password" type="password" required autocomplete="current-password"/>
            <x-form.error :messages="$errors->get('password')"/>
        </div>
        <div><x-form.button>Confirmar</x-form.button></div>
    </form>
</x-auth.card>
