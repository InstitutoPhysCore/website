<x-auth.card title="Cadastrar nova senha">
    <form method="POST" action="{{ route('password.store') }}" class="grid gap-6">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div>
            <x-form.label for="Email"> Email </x-form.label>
            <x-form.input id="Email" name="email" type="email" :value="old('email', $request->email)" required autofocus autocomplete="username"/>
            <x-form.error :messages="$errors->get('email')"/>
        </div>
        <div>
            <x-form.label for="Password"> Nova senha </x-form.label>
            <x-form.input id="Password" name="password" type="password" required autocomplete="new-password"/>
            <x-form.error :messages="$errors->get('password')"/>
        </div>
        <div>
            <x-form.label for="PasswordConfirmation"> Confirme a nova senha </x-form.label>
            <x-form.input id="PasswordConfirmation" name="password_confirmation" type="password" required autocomplete="new-password"/>
            <x-form.error :messages="$errors->get('password_confirmation')"/>
        </div>
        <div><x-form.button>Redefinir senha</x-form.button></div>
    </form>
</x-auth.card>
