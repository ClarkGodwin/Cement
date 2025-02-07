<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Last_name -->
        <div>
            <x-input-label for="last_name" :value="__('Nom de famille')" />
            <x-text-input id="last_name" class="tw-block tw-mt-1 tw-w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('last_name')" class="tw-mt-2" />
        </div>

        <!-- First_name -->
        <div class=" tw-mt-4">
            <x-input-label for="first_name" :value="__('Prenom')" />
            <x-text-input id="last_name" class="tw-block tw-mt-1 tw-w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('first_name')" class="tw-mt-2" />
        </div>

        <!-- Email Address -->
        <div class="tw-mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="tw-block tw-mt-1 tw-w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="tw-mt-2" />
        </div>

        <!-- Password -->
        <div class="tw-mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="tw-block tw-mt-1 tw-w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="tw-mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="tw-mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

            <x-text-input id="password_confirmation" class="tw-block tw-mt-1 tw-w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
            <a class="tw-underline tw-text-sm tw-text-gray tw-font-bold hover:tw-no-underline tw-rounded-double  focus:tw-ring-indigo-500 " href="{{ route('login') }}">
                {{ __('Deja inscris?') }}
            </a>

            <x-primary-button class="tw-ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
