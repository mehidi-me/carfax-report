<x-guest-layout>
    {{-- <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}
    <main>
        <div class="container">
            <div class="form-wrap">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="typo">
                        <h3>Registration</h3>
                    </div>
                    <div class="fild">
                        <input type="email" id="email" name="email" placeholder=" " required autofocus autocomplete="username"><label for="email">Email<span>*</span></label>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <div class="fild">
                        <input type="password"  name="password"
                        required autocomplete="current-password" id="pass" placeholder=" "><label for="pass">Password<span>*</span></label>
                        <i class="uil uil-eye" id="toggle-password" style="cursor: pointer;"></i>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <button class="btn">Login</button>
                    <p>Forgot password? <a href="{{ route('password.request') }}">Reset now</a></p>
                </form>
                <p>Not a user? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </main>
</x-guest-layout>
<script>
    const togglePassword = document.querySelector('#toggle-password');
  const passwordField = document.querySelector('#pass');

  togglePassword.addEventListener('click', function () {
    // Toggle the type attribute of the password field
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);

    // Toggle the icon class
    this.classList.toggle('uil-eye');
    this.classList.toggle('uil-eye-slash');
  });
</script>