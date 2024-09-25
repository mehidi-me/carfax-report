<x-guest-layout>
    {{-- <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form> --}}
    <main>
        <div class="container">
            <div class="form-wrap">
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <div class="typo">
                        <h3>Reset password</h3>
                    </div>
                    <div class="fild">
                        <input type="text" id="email" placeholder=" " name="email" required autofocus autocomplete="username"><label for="email">
                            Email<span>*</span></label>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <div class="fild">
                        <input type="password" name="password" required autocomplete="new-password" id="pass" placeholder=" " ><label for="pass">New
                            Password<span>*</span></label>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <div class="fild">
                        <input type="password"
                        name="password_confirmation" required autocomplete="new-password"  id="con-pass" placeholder=" "><label for="con-pass">Confirm New
                            Password<span>*</span></label>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    <button class="btn">Confirm Registration</button>
                </form>
            </div>
        </div>
    </main>
</x-guest-layout>
