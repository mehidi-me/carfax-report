<x-guest-layout>
    <div class="modal modal_loading">
        <div class="modal-main">
            <div style="display: none">
                <div class="progress-container">
                    <div class="progress-circle" id="progressCircle">
                        <span id="progressValue">0%</span>
                    </div>
                </div>
            </div>
            <p style="    text-align: center;
    font-size: 24px;
    font-weight: bold;">We are generating report</p>
            <div style="    display: flex;
    align-items: center;
    justify-content: center;">
                <img src="{{asset('/images/Loading.gif')}}" alt="">
            </div>
        </div>
    </div>
    <div class="modal modal_not_found">
        <div class="modal-main">
            <div class="typo">
                <h3 id="errorText">Report not found!</h3>
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
            {{-- <p>Records: <span>53</span></p> --}}
            <p>Auto: <span id="vinName">FORD TRANSIT 35O XLT 2015</span></p>
            <p>VIN: <span id="vinValueShow">1FBAX2CM6FKA44189</span></p>

            <div class="cta">
                <form action="{{ Auth::check() ? url('/checkout') : url('/checkout-without-login') }}" method="post">
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

<div class="grid-3">
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
            {{-- <button class="mt-3 center">View sample report</button> --}}
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
            {{-- <iframe src="https://www.youtube.com/embed/yOgt4eU1TcI"
                title="The Nissan Skyline GT-R 34, Supra&#39;s ultimate RIVAL! (4K)" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}
                <iframe src="https://www.loom.com/embed/edf31bdc4c7f4509934030f1885d6af8?sid=598534ff-a9e0-4e4d-84b3-adcd53d766c6" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
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
                        <p>How long can I find these reports on my account?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            1 year from the date that you purchased
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>Where is the VIN number located?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            Basically, the VIN is located on the plate, which is located under the windshield. Another number is printed in the registration documents.
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>What is a VIN?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            VIN is a 17 digit code. This is the vehicle identification number. Each letter and digit of the code has its own meaning, which is decoded by our system. With the help of such a code, we determine the year of manufacture, brand, and other nuances of a particular model. The VIN is an important identifier for the information contained in CARFAX reports. The vehicle identification number is an individual code for a specific vehicle. VIN is single, no two VIN numbers are the same. The VIN-code reflects the individual features of the car, its characteristics.
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>Do I have to be the owner of a vehicle to order a CARFAX RECORD?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            Not necessary. Anyone can order a CARFAX report. In order for you to easily order a report, you need to provide an email address and a credit card. You will also need a VIN to generate a report.
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>What if I can't place an order from the site?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            If you are unable to order a Carfax history report on the page then you should try to refresh the page or go to it again. If you can’t place an order in any way, then you should contact customer support at the support email address.
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>I am a business owner and want to buy more credits, how can I do this?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            You can see the package tiers to buy multiple credits at once above. If you have any issues please contact support@carfaxgenie.con
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>The VIN I have entered is not found, why?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            We recommend entering it in twice just to make sure as sometime is can glitch in searching. If it still isn’t found then confirm you entered it correct or with the vehicle owner. Worst case scenario please reach out to support@carfaxgenie.com
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>What should I do if I'm having trouble accessing my account?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            Enter forgot password.
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>How do I pay for a CARFAX Report?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            You will be sent to a stripe portal 
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>Can I cancel my order?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            Once you’ve enter your stripe details then your report has been generated and been paid for. If you received the report you are not able to cancel anymore
                        </p>
                    </div>
                </div>
                <div class="faq">
                    <div class="question">
                        <p>Can I get a refund for a CARFAX Report?</p>
                        <div class="ico"><span></span> <span></span></div>
                    </div>
                    <div class="ans">
                        <p>
                            If you paid and the report wasn’t generated please reach out to support. We can get you the report or refund you, whichever you prefer.
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
        const errorText = document.getElementById("errorText");
        const progressCircle = document.getElementById('progressCircle');
    const progressValue = document.getElementById('progressValue');
    const progressContainer = document.querySelector('.progress-container');
    let percentage = 0;

    function updateProgressBar(percentage) {
        const progress = percentage + '%';
        progressCircle.style.background = `conic-gradient(#4caf50 ${progress}, #ddd ${progress})`;
        progressValue.textContent = progress;
    }

       // var isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};
       var isAuthenticated = true;
        if (isAuthenticated) {
            let vinValue = document.getElementById('vin_input').value;
            if (!vinValue) return alert("Vin is requered!");
            // 
            searchReportBtn.innerHTML = "Loading...";
            searchReportBtn.disabled = true;
            document.querySelector('.modal_loading').style.display = 'flex';

             // Start progress animation
        let interval = setInterval(() => {
            if (percentage < 100) {
                percentage += 1;
                updateProgressBar(percentage);
            } else {
                clearInterval(interval); // Stop the progress animation when it reaches 100%
            }
        }, 200);

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
                        document.querySelector('.modal_loading').style.display = 'none';
                        clearInterval(interval);
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
                         document.getElementById('vinName').innerHTML = data?.name;
                    } else {
                        document.querySelector('.modal_not_found').style.display = 'flex';
                        errorText.innerHTML = data.message
                    }

                    searchReportBtn.innerHTML = "Search my report";
                    searchReportBtn.disabled = false;
                    document.querySelector('.modal_loading').style.display = 'none';
                    clearInterval(interval);
                })
                .catch(error => {
                    searchReportBtn.innerHTML = "Search my report";
                    searchReportBtn.disabled = false;
                    document.querySelector('.modal_loading').style.display = 'none';
                    clearInterval(interval);
                    console.error('There was a problem with the fetch operation:', error);
                    document.querySelector('.modal_not_found').style.display = 'flex';
                    errorText.innerHTML = "Something Wrong Try Again!"
                 
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
