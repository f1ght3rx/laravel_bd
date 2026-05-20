<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Имя -->
        <div>
            <x-input-label for="name" value="Имя" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Отчество -->
        <div class="mt-4">
            <x-input-label for="middlename" value="Отчество" />
            <x-text-input id="middlename" class="block mt-1 w-full" type="text" name="middlename" :value="old('middlename')"
                required autocomplete="middlename" />
            <x-input-error :messages="$errors->get('middlename')" class="mt-2" />
        </div>

        <!-- Фамилия -->
        <div class="mt-4">
            <x-input-label for="lastname" value="Фамилия" />
            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')"
                required autocomplete="lastname" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Эл. почта -->
        <div class="mt-4">
            <x-input-label for="email" value="Эл. почта" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Логин -->
        <div class="mt-4">
            <x-input-label for="login" value="Логин" />
            <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required
                autocomplete="login" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Телефон -->
        <div class="mt-4">
            <x-input-label for="tel" value="Телефон" />
            <x-tel-input
                id="tel"
                class="block mt-1 w-full"
                type="text"
                name="tel"
                :value="old('tel')"
                required
                autocomplete="tel"
                placeholder="+7 (___) ___-__-__"
            />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- Пароль -->
        <div class="mt-4">
            <x-input-label for="password" value="Пароль" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Подтверждение пароля -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Подтвердите пароль" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                Уже зарегистрированы?
            </a>

            <x-primary-button class="ms-4">
                Зарегистрироваться
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
