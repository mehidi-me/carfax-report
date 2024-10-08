<x-guest-layout>
    <div class="modal modal_not_found">
        <div class="modal-main">
            <div class="typo">
                <h3>Report not found!</h3>
            </div>
            <p>VIN: <span id="vinValueShow2">1FBAX2CM6FKA44189</span></p>
            <div class="cta">
                <button class="empty" onclick="closeModal('modal_not_found')">Close</button>
            </div>
        </div>
    </div>
    <div class="modal modal_found">
        <div class="modal-main">
            <div class="typo">
                <h3>Report found!</h3>
                <p>There is info we received
                    from Carfax database.</p>
            </div>
            <p>Records: <span>53</span></p>
            <p>Auto: <span>FORD TRANSIT 35O XLT 2015</span></p>
            <p>VIN: <span id="vinValueShow">1FBAX2CM6FKA44189</span></p>

            <div class="cta">
                <form action="{{ url('/checkout') }}" method="post">
                    @csrf
                    <input type="hidden" value="1FBAX2CM6FKA44189" name="vin" id="payVin">
                    <button type="submit">Get my report</button>
                </form>

                <button class="empty" onclick="closeModal('modal_found')">Close</button>
            </div>
        </div>
    </div>
    <main class="home">
        <div class="container">
            <div class="content">
                <h1>Find Your Car’s History for Just $7</h1>
                <p>Enter Your VIN & Receive a Detailed Carfax Report</p>
                <div class="search-bar">
                    <input type="text" id="vin_input" placeholder="Enter your 17-Digit VIN">
                    <button onclick="searchReport()" id="searchReportBtn">Search my report</button>
                </div>
            </div>
        </div>

    </main>
    <section>
        <div class="container">
            <div class="grid-2 align-center">
                <div class="content">
                    <h2>What's your car worth?</h2>
                    <p>The free CARFAX Value Range tool offers an accurate estimate of your used car’s worth by
                        comparing it to similar models
                        sold. It factors in mileage, market trends, and location to help you negotiate a fair deal.</p>
                   <a href="#"> <button>Get Value</button></a>
                </div>
                <img class="fix" src="images/2.png" alt="">
            </div>
        </div>
    </section>
    <section class="bg" id="Packages">
        <div class="container">
            <div class="title">
                <h2>Cheap Carfax Packages</h2>
                <p>If you’re fed up with repeatedly entering your card details and navigating payment systems, consider
                    purchasing one of
                    our report packages. This allows you to buy Carfax reports instantly and effortlessly, without extra
                    steps.</p>
            </div>
            @php
    
    $packages = \App\Models\Packages::all(); // Fetch all packages from the database
@endphp

<div class="grid-4">
    @foreach($packages as $package)
        <div class="card">
            <div class="price">
                <h2><sup>$</sup>{{ $package->price }}</h2>
                <h3>{{ $package->credit }} Reports</h3>
            </div>
            <p>${{ number_format($package->price / $package->credit, 2) }}/report</p>
            <form action="{{route('checkout.package')}}" method="post">
                @csrf
                <input type="hidden" name="package_id" value="{{$package->id}}">
                <button>Buy reports</button>
            </form>
        </div>
    @endforeach
</div>


            {{-- <div class="grid-4">

                <div class="card">
                    <div class="price">
                        <h2><sup>$</sup>65</h2>
                        <h3>10 Reports</h3>
                    </div>
                    <p>$6.5/report</p>
                    <button>Buy reports</button>
                </div>
                <div class="card">
                    <div class="price">
                        <h2><sup>$</sup>150</h2>
                        <h3>25 Reports</h3>
                    </div>
                    <p>$6.5/report</p>
                    <button>Buy reports</button>
                </div>
                <div class="card">
                    <div class="price">
                        <h2><sup>$</sup>250</h2>
                        <h3>50 Reports</h3>
                    </div>
                    <p>$6.5/report</p>
                    <button>Buy reports</button>
                </div>
                <div class="card">
                    <div class="price">
                        <h2><sup>$</sup>400</h2>
                        <h3>400 Reports</h3>
                    </div>
                    <p>$6.5/report</p>
                    <button>Buy reports</button>
                </div>
            </div> --}}
        </div>
    </section>
    <section>
        <div class="container" id="Reports">
            <div class="title">
                <h2>Get the vehicle history report Canadians trust</h2>
                <p>Our report can provide you with critical details about a vehicle's history and help you make a more
                    informed decision. Here are just a few of the many things that every CARFAX Vehicle History
                    Report searches for:</p>
            </div>
            <div class="grid-3">
                <div class="card-2">
                    <h2>Vehicle Damage</h2>
                    <div class="list">
                        <p><i class="uil uil-check"></i>Accident history</p>
                        <p><i class="uil uil-check"></i>Frame or structural damage</p>
                        <p><i class="uil uil-check"></i>Damage location</p>
                        <p><i class="uil uil-check"></i>Weather damage</p>
                        <p><i class="uil uil-check"></i>Repair estimates and costs</p>
                    </div>
                </div>
                <div class="card-2">
                    <h2>Safety & Service</h2>
                    <div class="list">
                        <p><i class="uil uil-check"></i>Unfixed safety recalls</p>
                        <p><i class="uil uil-check"></i>Service history</p>
                        <p><i class="uil uil-check"></i>Tire rotation</p>
                        <p><i class="uil uil-check"></i>Brake replacements</p>
                        <p><i class="uil uil-check"></i>Oil changes</p>
                    </div>
                </div>
                <div class="card-2">
                    <h2>Other Essential Details</h2>
                    <div class="list">
                        <p><i class="uil uil-check"></i>Money owing on the vehicle (lien)</p>
                        <p><i class="uil uil-check"></i>Vehicle Theft</p>
                        <p><i class="uil uil-check"></i>Rebuild or salvage title</p>
                        <p><i class="uil uil-check"></i>Odometer reading</p>
                        <p><i class="uil uil-check"></i>and more!</p>
                    </div>
                </div>
            </div>
            <button class="mt-3 center">View sample report</button>
        </div>
    </section>
    <section class="bg">
        <div class="container">
            <div class="title">
                <h2>Industry giants trust CARFAX. So should you.</h2>
            </div>
            <div class="logos">
                <img src="images/l1.png" alt="">
                <img src="images/l2.png" alt="">
                <img src="images/l3.png" alt="">
                <img src="images/l4.png" alt="">
                <img src="images/l5.png" alt="">
                <img src="images/l6.png" alt="">
                <img src="images/l7.png" alt="">
                <img src="images/l8.png" alt="">
            </div>
        </div>
    </section>
    <section>
        <div class="container" id="Tutorial">
            <div class="title">
                <h2>Tutorial (Video)</h2>
            </div>
            <iframe src="https://www.youtube.com/embed/yOgt4eU1TcI"
                title="The Nissan Skyline GT-R 34, Supra&#39;s ultimate RIVAL! (4K)" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </section>
    <section class="bg" id="faq_section">
        <div class="container">
            <div class="title">
                <h2>F.A.Q</h2>
            </div>
            <div class="faq-wrap">
                <div class="faq">
                    <div class="question">
                        <p>Can I order one report per classic car?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            Unfortunately not on our site. All cars made before 1981 are not included in our database
                            and are not recorded in
                            regular records.
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>Can I order one report per classic car?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            Unfortunately not on our site. All cars made before 1981 are not included in our database
                            and are not recorded in
                            regular records.
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>Can I order one report per classic car?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            Unfortunately not on our site. All cars made before 1981 are not included in our database
                            and are not recorded in
                            regular records.
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>Can I order one report per classic car?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            Unfortunately not on our site. All cars made before 1981 are not included in our database
                            and are not recorded in
                            regular records.
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>Can I order one report per classic car?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            Unfortunately not on our site. All cars made before 1981 are not included in our database
                            and are not recorded in
                            regular records.
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>Can I order one report per classic car?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            Unfortunately not on our site. All cars made before 1981 are not included in our database
                            and are not recorded in
                            regular records.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="grid-2">
                <div class="card-3">
                    <h3>Return policy.</h3>
                    <p>We provide products and services with a 100% guarantee and simple return policies.
                        In case of receiving an error message when creating a report, we wil refund 100%
                        of the funds If you have any questions regarding your order, or the return policy
                        then you can send allinformation by e-mail</p>
                </div>
                <div class="card-3">
                    <h3>Didn't receive our response within 24 hours?</h3>
                    <p>If suddenly you find that you have not received a response, you need to check the
                        junk mail or report it to us through the support form. We answer all emails within 24
                        hours.</p>
                </div>
                <div class="card-3">
                    <h3>Where can I get a free Carfax report?</h3>
                    <p>When buying a car, you can check each dealer on AutoTrader.com and Cars.com. As
                        a rule, dealers have already purchased a CARFAX from us and are ready to provide it
                        free of charge. Al you have to do is check with the dealer if you can get a free auto
                        fax report. Most of the list contains links to free CARFAX reports.</p>
                </div>
                <div class="card-3">
                    <h3>Legal disclaimer.</h3>
                    <p>Our company does not have contracts with CARFAX Inc that would allow them to
                        distribute their reports. Allogos and brands are registered trademarks of their
                        respective owners. This website is not afiliated with CARFAX Inc or any other brand
                        associated with it.</p>
                </div>
                <div class="card-3">
                    <p>lf you are buying from a private seller, then you wil most likely have to buy the
                        report yourself. This is not very convenient, especially if you have not decided on a
                        car yet. However, quite often you can also purchase a report from a private seller for
                        a fee, especially if you were able to save money by purchasing a cheap CARFAX
                        report online.</p>
                </div>
                <div class="card-3">
                    <p>lf suddenly the Carfax report is not good enough, and you are looking for a CARFAX
                        report for free, then you can get it only if you buy a car from an authorized dealer</p>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>


<script>
    function searchReport() {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const searchReportBtn = document.getElementById("searchReportBtn");
        var isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};
        if (isAuthenticated) {
            let vinValue = document.getElementById('vin_input').value;
            if (!vinValue) return alert("Vin is requered!");
            // 
            searchReportBtn.innerHTML = "Loading...";
            searchReportBtn.disabled = true;
            fetch('{{ route('search.vin') }}', {
                    method: 'POST', // POST method
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken // Include CSRF token in the headers
                    },
                    body: JSON.stringify({
                        vin_input: vinValue.toUpperCase() // Send the VIN input as JSON
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        searchReportBtn.innerHTML = "Search my report";
                        searchReportBtn.disabled = false;
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // Parse the response as JSON
                })
                .then(data => {
                    // Handle the response data here
                    if (data.status) {
                        document.querySelector('.modal_found').style.display = 'flex';
                        document.getElementById('payVin').value = vinValue.toUpperCase();
                        document.getElementById('vinValueShow').innerHTML = vinValue.toUpperCase();
                        document.getElementById('vinValueShow2').innerHTML = vinValue.toUpperCase();
                    } else {
                        document.querySelector('.modal_not_found').style.display = 'flex';
                    }

                    searchReportBtn.innerHTML = "Search my report";
                    searchReportBtn.disabled = false;
                })
                .catch(error => {
                    searchReportBtn.innerHTML = "Search my report";
                    searchReportBtn.disabled = false;
                    console.error('There was a problem with the fetch operation:', error);
                });
        } else {
            window.location.href = "{{ route('login') }}";
        }


    }

    function closeModal(element) {
        document.querySelector('.' + element).style.display = 'none';
    }

    function getMyReport() {
        document.getElementById("checkoutForm").submit();
    }
</script>
