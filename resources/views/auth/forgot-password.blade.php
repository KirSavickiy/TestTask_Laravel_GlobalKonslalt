<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Забыли пароль? Не проблема. Просто укажите свой адрес электронной почты, и мы отправим вам ссылку для сброса пароля, с помощью которой вы сможете установить новый.') }}
    </div>

    <!-- Статус сессии -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Адрес электронной почты -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Восстановить пароль') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
