<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- CSRF Token for security -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Car Fax') }}</title>

        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <header>
            <div class="container">
                <div class="logo">
                    <img src="images/logo.png" alt="">
                </div>
                <div class="links">
                    <a href="{{ url('/') }}" onclick="menu()">Home</a>
                    <a href="#" onclick="menu()">Reports</a>
                    <a href="#Packages" onclick="menu()">Packages</a>
                    <a href="#" onclick="menu()">Tutorial</a>
                    <a href="#" onclick="menu()">FAQ</a>
                </div>
                <div class="cta">
                    @if (Route::has('login'))
                
                        @auth
                        <div style="    border: 1px solid #333;
                        border-radius: 5px;
                        padding: 3px 10px;
                        font-weight: bold;font-size: 14px">Credit: {{Auth::user()->credit}}</div>
                            <a href="{{ url('/dashboard') }}"><button>Dashboard</button></a>
                        @else
                            <a href="{{ route('login') }}" ><button>Log in</button></a>
                        @endauth
                    @endif
                    
                    <div class="menu" onclick="menu()">
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </header>
        {{ $slot }}
        <footer>
            <div class="container">
                <div class="f-links">
                    <a mailto="support@carfaxgenie.com">support@carfaxgenie.com</a>
                    <a href="{{url('/privacy-policy')}}">Privacy/Legal</a>
                    <a href="{{url('/terms-and-conditions')}}">Terms & Conditions</a>
                </div>
                <p>Copyright © 2024 CarFax Genie. All Rights Reserved.</p>
            </div>
        </footer>
    </body>

    <script src="{{asset('/js/app.js')}}"></script>
</html>
