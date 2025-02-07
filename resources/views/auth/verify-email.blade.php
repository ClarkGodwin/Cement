<x-guest-layout>
    <div class="tw-mb-4 tw-text-sm tw-text-gray">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        {{ __('Merci de vous etre inscris! Avant de commencer, verifier votre addresse email en cliquant sur le lien qu\'on vient de vous envoyer dans votre boite mail. Si vous n\'avez pas recu le mail, nous vous en enverrons un autre') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="tw-mb-4 tw-font-medium tw-text-sm tw-text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="tw-mt-4 tw-flex tw-items-center tw-justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="tw-underline tw-text-sm tw-text-gray hover:tw-text-gray tw-rounded-double focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
