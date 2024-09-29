<header>
    <div class="container">
        <div class="greetings">
            <p>Hi <span>{{Auth::user()->name}}</span>,</p>
            <h1>Welcome back</h1>
        </div>
        <a href="{{route('profile')}}">
            <div class="profile-pic">
                <img src="{{ asset('/storage/profile_images/' . Auth::user()->profile_image) }}" alt="">
            </div>
        </a>
    </div>
</header>