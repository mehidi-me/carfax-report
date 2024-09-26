<x-app-layout>
   
    {{-- <main>
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

                    <div class="fild">
                        <input type="password"  name="password"
                        required autocomplete="current-password" id="pass" placeholder=" "><label for="pass">Password<span>*</span></label>
                    </div>
                    <button class="btn">Login</button>
                    <p>Forgot password? <a href="{{ route('password.request') }}">Reset now</a></p>
                </form>
                <p>Not a user? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </main> --}}
    <main>
        <div class="container">
            <div class="block">
                <h2 class="title">
                    Login
                </h2>
                <form  method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="fild">
                        <input  type="email" id="email" name="email" placeholder=" " required autofocus autocomplete="username"><label for="email">Email</label>
                    </div>
                    <div class="fild">
                        <input type="password"  name="password"
                        required autocomplete="current-password" id="pass" placeholder=" "><label for="pass">Password</label>
                        <i class="uil uil-eye" id="toggle-password" style="cursor: pointer;"></i>
                    </div>
                    <button type="submit">Start TepaTepi</button>

                    <div class="addons">
                        <p>Already have an account? <a href="{{ route('register') }}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-app-layout>

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