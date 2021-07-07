<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ route('login') }}">
                <img class="mx-auto h-12 w-auto" src="{{ asset('image/unand.png') }}" alt="Workflow">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Forgot Password
                </h2>
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-form.label for="email" :value="__('Email')" />

                <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-form.button>
                    {{ __('Email Password Reset Link') }}
                </x-form.button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
