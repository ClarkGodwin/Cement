<x-guest-layout>
    <div class="tw-mb-4 tw-text-sm tw-text-gray-600 dark:text-gray-400">
        {{ __('C\'est une zone securisee de l\'application. Veuillez confirmer votre mot de passe.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="tw-block tw-mt-1 tw-w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="tw-mt-2" />
        </div>

        <div class="tw-flex tw-justify-end tw-mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
