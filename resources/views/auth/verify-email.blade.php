<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Спасибо за регистрацию! Перед тем как начать, пожалуйста, подтвердите свой адрес электронной почты, пройдя по ссылке, которую мы отправили вам на email. Если вы не получили письмо, мы с радостью отправим вам новое.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Новая ссылка для подтверждения была отправлена на указанный вами адрес электронной почты.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Отправить повторно письмо для подтверждения') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Выйти') }}
            </button>
        </form>
    </div>
</x-guest-layout>
