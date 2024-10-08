<x-guest-layout>
    {{-- <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form> --}}
    <main>
        <div class="container">
            <div class="form-wrap">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="typo">
                        <h3>Forgot Password</h3>
                        <p>Forgot your password? No problem.
                            Just give us your email address and we
                            will send you a password reset link that
                            will allow you to set a new password.</p>
                    </div>
                    <div class="fild">
                        <input type="email" id="email" placeholder=" " name="email"  required autofocus><label for="email">Email<span>*</span></label>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <button class="btn">Send Reset link</button>
                </form>
                <p>Not a user? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </main>
</x-guest-layout>
