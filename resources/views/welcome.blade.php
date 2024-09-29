<x-guest-layout>
    <x-header></x-header>
    <main class="mt-2">
        <div class="container">
            <div class="block report">
                <div class="card">
                    <p>Your Level</p>
                    <div class="lavel">
                        <img src="images/new.svg" alt="">
                    </div>
                    <h3>Newby</h3>
                </div>
                <div class="card">
                    <p>Leaderboard</p>
                    <div class="rank">
                        <h2>120</h2>
                    </div>
                    <h3>Your rank</h3>
                </div>
                <div class="card">
                    <p>Top Tepa Orders</p>
                    <div class="coin">
                        <img src="images/coin.png" alt="">
                        <h2>0</h2>
                    </div>
                </div>
                <div class="card">
                    <p>Tap Rating</p>
                    <h2 class="rating-percentage">0%</h2>
                    <div class="bar-wraper">
                        <div class="progress-bar">
                            <div class="progress" style="--w:0%"></div>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="block game-board">
                <!-- after countdown end "cowndown div should gone" -->
                <div class="cowndown-main">
                </div>
                <!-- after clicking start "start div should be gone" -->
                <div class="start">
                    <button id="startButton">
                        Start
                    </button>
                </div>
                <div class="whole" id="whole1">
                    <!-- <div class="anim-img">
                        <img src="images/client.png" alt="">
                    </div>
                    <p>+20 Orders</p> -->
                </div>
                <div class="whole" id="whole2"></div>
                <div class="whole" id="whole3"></div>
                <div class="whole" id="whole4"></div>
                <div class="whole" id="whole5">
                    <!-- <div class="anim-img">
                        <img src="images/client2.png" alt="">
                    </div>
                    <p>-20 Orders</p> -->
                </div>
                <div class="whole" id="whole6"></div>
                <div class="whole" id="whole7">
                    <!-- <div class="anim-img">
                        <img src="images/client3.png" alt="">
                    </div>
                    <p>+30 Orders</p> -->
                </div>
                <div class="whole" id="whole8"></div>
                <div class="whole" id="whole9"></div>
            </div>
        </div>
    </main>
    <x-bottom-nav></x-bottom-nav>
</x-guest-layout>
<script src="{{asset('/js/app.js')}}"></script>


