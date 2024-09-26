<link rel="stylesheet" href="{{asset('/css/profile.css')}}">
<x-guest-layout>
  
    <main class="mt-2">
        <div class="container">
            <h2 class="title">
                Profile Settings
            </h2>
            <div class="gap-1">
                <div class="block">
                    <div class="profile-input">
                        <label class="profile-pic" for="pic-up">
                            <img src="{{ asset('/storage/profile_images/' . Auth::user()->profile_image) }}" alt="">
                            <i class="uil uil-camera-plus"></i>
                        </label>
                        <input type="file" id="pic-up">
                    </div>
                    <div class="user-name">
                        <input type="text" disabled value="{{Auth::user()->name}}">
                        <i class="uil uil-edit"></i>
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="flex">
                    <p>Primary theme color</p>
                    <div class="color-picker">
                        <label for="color" style="--i: #1dbf73"></label>
                        <input type="color" id="color">
                    </div>
                </div>
            </div>
            <div class="action">
                <button>Save Changes</button>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                
                    <a href="{{route('logout')}}"
                    onclick="event.preventDefault();
                                this.closest('form').submit();"><button class="alert">Logout</button></a>
                </form>
                
            </div>
        </div>
    </main>
    <div class="footer-menu">
        <div class="container">
            <div class="ico">
                <i class="uil uil-info-circle"></i>
            </div>
            <div class="ico"><i class="uil uil-list-ol-alt"></i></div>
            <div class="ico order"><i class="uil uil-clipboard-notes"></i></div>
            <div class="ico"><i class="uil uil-bell"></i>
                <div class="alert"></div>
            </div>
            <div class="ico"><i class="uil uil-user"></i></div>
        </div>
    </div>
    <x-bottom-nav></x-bottom-nav>
</x-guest-layout>
