<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, please verify your email by clicking the link we just emailed to you.') }}
        <br>
        {{ __('If you didn’t receive the email, we can send you another.') }}
    </div>

    @if (session('status') === 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to your email address.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button>{{ __('Resend Verification Email') }}</x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>