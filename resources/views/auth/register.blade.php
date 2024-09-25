<x-guest-layout>
    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

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
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}
    <main>
        <div class="container">
            <div class="form-wrap">
                <form  method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="typo">
                        <h3>Registration</h3>
                    </div>
                    
                        <div class="fild">
                            <input type="text" id="first-name" placeholder=" " name="name" required autofocus autocomplete="name"><label for="first-name">First
                                name<span>*</span></label>
                        </div>
                   
                    <div class="fild">
                        <input type="email" id="email" placeholder=" " name="email" required autofocus autocomplete="username"><label for="email">Email<span>*</span></label>
                    </div>

                    <div class="fild">
                        <input type="password"
                        name="password"
                        required autocomplete="new-password" id="pass" placeholder=" "><label for="pass">Password<span>*</span></label>
                        
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="m-2" />
                    <div class="fild">
                        <input  type="password"
                        name="password_confirmation" required autocomplete="new-password" id="con-pass" placeholder=" "><label for="con-pass">Confirm
                            Password<span>*</span></label>
                          
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="m-2" />
                    <button class="btn">Confirm Registration</button>
                </form>
                <p>Already Registred? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </div>
    </main>
</x-guest-layout>
