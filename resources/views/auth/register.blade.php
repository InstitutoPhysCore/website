<x-auth-layout>
    <div class="lg:grid lg:min-h-screen lg:grid-cols-12">

        <!-- Container Apresentação Desktop -->
        <section class="relative flex h-32 items-end bg-violet-900 lg:col-span-5 lg:h-full xl:col-span-6">
            <div class="hidden lg:relative lg:block lg:p-12">
                <img class="h-32" src="{{ asset('images/astronauta.webp') }}"/>
                <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl"> Bem-vindo ao Instituto PhysCore! </h2>
                <p class="mt-4 leading-relaxed text-white/90"> Crie uma conta e tenha acesso a todos nossos conteúdos, é de graça!  </p>
            </div>
        </section>

        <main class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
            <div class="max-w-xl lg:max-w-3xl">

                <!-- Container Apresentação Mobile -->
                <div class="relative -mt-16 block lg:hidden">
                    <a class="inline-flex size-16 items-center justify-center rounded-full bg-white text-blue-600 sm:size-20 dark:bg-gray-900" href="#">
                        <span class="sr-only">Home</span>
                        <img class="h-10" src="{{ asset('images/astronauta.webp') }}"/>
                    </a>
                    <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl dark:text-white"> Bem-vindo ao Instituto PhysCore! </h1>
                    <p class="mt-4 leading-relaxed text-gray-500 dark:text-gray-400"> Crie uma conta e tenha acesso a todos nossos conteúdos, é de graça! </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="mt-8 grid grid-cols-2 gap-6">
                    @csrf
                    <div class="col-span-2">
                        <x-form.label for="Nome"> Nome </x-form.label>
                        <x-form.input id="Nome" name="name" type="text" :value="old('name')" placeholder="Insira aqui seu nome e sobrenome"/>
                        <x-form.error :messages="$errors->get('name')"/>
                    </div>
                    <div class="col-span-2">
                        <x-form.label for="Email"> Email </x-form.label>
                        <x-form.input id="Email" name="email" type="email" :value="old('email')" placeholder="Insira aqui seu email"/>
                        <x-form.error :messages="$errors->get('email')"/>
                    </div>
                    <div class="">
                        <x-form.label for="Password"> Senha </x-form.label>
                        <x-form.input id="Password" name="password" type="password" placeholder="Insira aqui sua senha"/>
                        <x-form.error :messages="$errors->get('password')"/>
                    </div>
                    <div class="">
                        <x-form.label for="PasswordConfirmar"> Confirmar Senha </x-form.label>
                        <x-form.input id="PasswordConfirmar" name="password_confirmation" type="password" placeholder="Confirme aqui sua senha"/>
                    </div>
                    <div class="sm:flex sm:items-center sm:gap-4">
                        <x-form.button>Registrar</x-form.button>
                        <p class="mt-4 text-sm text-gray-500 sm:mt-0 dark:text-gray-400"> Já tem uma conta? <a href="{{route('login')}}" class="text-gray-700 underline dark:text-gray-200">Faça seu login aqui</a></p>
                    </div>
                </form>
        </div>
    </main>
</div>
</x-auth-layout>
