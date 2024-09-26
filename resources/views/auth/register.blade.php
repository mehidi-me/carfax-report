<x-app-layout>
  
    {{-- <main>
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
    </main> --}}

    <main>
        <div class="container">
            <div class="block">
                <h2 class="title">
                    Register
                </h2>
                <form method="POST"  enctype="multipart/form-data" action="{{ route('register') }}">
                    @csrf
                    <div class="profile-input">
                        <label class="profile-pic" for="pic-up">
                            <img id="image-preview" src="images/user.png" alt="">
                            <i class="uil uil-camera-plus"></i>
                        </label>
                        <input type="file" name="profile_image" accept="image/*" id="pic-up" onchange="previewImage(event)">
                    </div>
                    <x-input-error :messages="$errors->get('profile_image')" class="m-2" />
                    <div class="fild">
                        <input type="text" id="public-name" placeholder=" " name="name" required autofocus autocomplete="name"><label for="public-name">Public
                            profile name
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="m-2" />
                    <div class="fild">
                        <input  type="email" id="email" placeholder=" " name="email" required autofocus autocomplete="username"><label for="email">Email</label>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="m-2" />
                    <div class="fild">
                        <input type="password"
                        name="password"
                        required autocomplete="new-password" id="pass" placeholder=" "><label for="pass">Password</label>
                        <i class="uil uil-eye" id="toggle-password" style="cursor: pointer;"></i>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="m-2" />
                    <div class="fild">
                        <input  type="password"
                        name="password_confirmation" required autocomplete="new-password" id="c-pass" placeholder=" "><label for="c-pass">Confirm
                            password</label>
                        <i class="uil uil-eye" id="toggle-password2" style="cursor: pointer;"></i>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="m-2" />
                    <button type="submit">Start TepaTepi</button>

                    <div class="addons">
                        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-app-layout>
<script>
 function previewImage(event) {
            const reader = new FileReader();
            const imageField = document.getElementById('image-preview');

            reader.onload = function () {
                if (reader.readyState === 2) {
                    imageField.src = reader.result; // Set the image source to the loaded file
                }
            }

            reader.readAsDataURL(event.target.files[0]); // Read the uploaded file as a data URL
        }


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
    const togglePassword2 = document.querySelector('#toggle-password2');
  const passwordField2 = document.querySelector('#c-pass');

  togglePassword2.addEventListener('click', function () {
    // Toggle the type attribute of the password field
    const type = passwordField2.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField2.setAttribute('type', type);

    // Toggle the icon class
    this.classList.toggle('uil-eye');
    this.classList.toggle('uil-eye-slash');
  });
</script>