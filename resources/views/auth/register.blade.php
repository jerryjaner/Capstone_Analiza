@extends('layouts.guest')
@section('title')
Register | SRMS
@endsection
@section('content')

<form method="POST" action="{{ route('register_signup') }}">
    @csrf
    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
        <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                Sign Up
            </h2>
            <div class="intro-x mt-2 text-gray-500 dark:text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account.</div>


            <div class="flex">
                {{-- <x-validation-errors class="intro-x mt-4 mx-auto" /> --}}
                @if (session('message'))
                    <div class="mb-4 font-medium text-lg text-green-700">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="flex">
                <x-validation-errors class="intro-x mt-4 mx-auto" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="intro-x mt-8">
                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block" pattern="[0-9]{3}-{1}[0-9]{2}-[0-9]{5}" minlength="12" maxlength="12" placeholder="Account No. EX: 012-34-56789" name="account_no" value="{{old('account_no')}}" autocomplete="account_no" autofocus>
                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Name" name="name" value="{{old('name')}}" autocomplete="name" autofocus>
                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Email" name="email" value="{{old('email')}}" autocomplete="email" autofocus>
                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4" pattern="[0-9]{11}" minlength="11" maxlength="11" placeholder="Phone Number" name="cp" value="{{old('cp')}}" autocomplete="cp" autofocus>
                {{-- <select id="address" class="intro-x login__input input input--lg border border-gray-300 block mt-4" name="address">
                    <option selected disabled>Choose a Location</option>
                    <option value="A. Bonifacio">A. Bonifacio</option>
                    <option value="Abad Santos">Abad Santos</option>
                    <option value="Aguinaldo">Aguinaldo</option>
                    <option value="Antipolo">Antipolo</option>
                    <option value="Beguin">Beguin</option>
                    <option value="Benigno S. Aquino">Benigno S. Aquino</option>
                    <option value="Bical">Bical</option>
                    <option value="Bonga">Bonga</option>
                    <option value="Butag">Butag</option>
                    <option value="Cadandanan">Cadandanan</option>
                    <option value="Calomagon">Calomagon</option>
                    <option value="Calpi">Calpi</option>
                    <option value="Cocok-Cabitan">Cocok-Cabitan</option>
                    <option value="Daganas">Daganas</option>
                    <option value="Danao">Danao</option>
                    <option value="Dolos">Dolos</option>
                    <option value="E. Quirino">E. Quirino</option>
                    <option value="Fabrica">Fabrica</option>
                    <option value="G. del Pilar">G. del Pilar</option>
                    <option value="Gate">Gate</option>
                    <option value="Inararan">Inararan</option>
                    <option value="J. Gerona">J. Gerona</option>
                    <option value="J. P. Laurel">J. P. Laurel</option>
                    <option value="Jamorawon">Jamorawon</option>
                    <option value="Lajong">Lajong</option>
                    <option value="Libertad">Libertad</option>
                    <option value="M. Roxas">M. Roxas</option>
                    <option value="Magsaysay">Magsaysay</option>
                    <option value="Managanaga">Managanaga</option>
                    <option value="Marinab">Marinab</option>
                    <option value="Montecalvario">Montecalvario</option>
                    <option value="N. Roque">N. Roque</option>
                </select> --}}
                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="House / Block / Lot" name="house_block_lot" value="{{old('house_block_lot')}}" autocomplete="house_block_lot" autofocus>
                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Street" name="street" value="{{old('street')}}" autocomplete="street" autofocus>
                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Subdivision / Village" name="subdivision" value="{{old('subdivision')}}" autocomplete="subdivision" autofocus>
                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Barangay" name="barangay" value="{{old('barangay')}}" autocomplete="barangay" autofocus>
                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Municipality" name="municipality" value="{{old('municipality')}}" autocomplete="municipality" autofocus>
                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Province" name="province" value="{{old('province')}}" autocomplete="province" autofocus>
                <textarea  class="input w-full mt-2 flex-1 border" placeholder="Enter your Landmark here for example: Front of the SSU Campus" name="landmark"  value="{{old('landmark')}}" autofocuscols="30" rows="5"></textarea>
                <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password" name="password" autocomplete="password" autofocus>
                <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password Confirmation" name="password_confirmation" autocomplete="password_confirmation" autofocus>


            </div>
            <div class="intro-x flex items-center text-gray-700 dark:text-gray-600 mt-4 text-xs sm:text-sm">
                <input type="checkbox" class="input border mr-2" id="remember-me" required>
                <label class="cursor-pointer select-none" for="remember-me">I agree to the</label>
                <a class="text-theme-1 dark:text-theme-10 ml-1" href="javascript:;" data-toggle="modal" data-target="#privacy_policy">Privacy Policy</a>.
            </div>
           <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                <a href="{{route('login')}}" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 align-top float-left">Back</a>
                <button id="registerButton" class="button button--lg w-full xl:w-32 text-white bg-theme-9 xl:mr-3 align-top float-right">Register</button>
            </div>

        </div>
    </div>
</form>

{{-- Privacy Policy Modal --}}
<div class="modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" id="privacy_policy">
    <div class="w-full max-w-4xl max-h-full mx-auto">
        <div class="p-10 bg-white rounded-lg shadow dark:bg-gray-700">
            <h1 class="intro-x font-bold text-2xl text-center xl:text-left">Terms & Condition</h1>
            <p class="text-justify intro-x">At Web-Based Service Request Management System, we are committed to protecting your privacy
                and providing you with a smooth and secure experience when using our service request management
                system. This Privacy Policy outlines how we collect, use, disclose, and protect your personal
                information.</p>

            <h1 class="intro-x font-bold text-2xl text-center xl:text-left mt-5">Information We Collect</h1>
            <p class="text-justify intro-x">

                <br>
                <b>User Information:</b> We may collect personal information such as your name, email address, phone
                number, and other contact details to facilitate communication and respond to your service requests. <br><br>


                <b>Request Details:</b> We collect information related to your service requests, including descriptions,
                attachments, and any other relevant data to process and fulfill your requests. <br><br>

                <b>Usage Data:</b> We may collect data on how you interact with our system, including IP addresses, device
                information, and usage patterns.</p>

            <h1 class="intro-x font-bold text-2xl text-center xl:text-left mt-5">How We Use Your Information</h1>
            <p class="text-justify intro-x">
                <br>
                <b> Requests: </b> We use your personal information and request details to process, manage, and fulfill your service requests.<br><br>

                <b>Communication:</b> We may use your contact information to respond to your inquiries, provide updates on your service requests, and send relevant notifications.<br><br>

                <b>System Improvements:</b> We analyze usage data to enhance the functionality and performance of our service request management system.

            </p>

            <h1 class="intro-x font-bold text-2xl text-center xl:text-left mt-5">Data Sharing</h1>
            <ul class="intro-x">
                <li class="list-disc">We may share your information with third-party service providers, contractors, or partners
                    involved in fulfilling your service requests.
                </li>
                <li class="list-disc">We will not sell, rent, or trade your personal information to third parties for marketing purposes.

                </li>
            </ul>

            <h1 class="intro-x font-bold text-2xl text-center xl:text-left mt-5">Data Protection</h1>
            <ul class="intro-x">
                <li class="list-disc">We employ security measures to protect your data from unauthorized access, disclosure,
                    alteration, and destruction.
                </li>
            </ul>

            <h1 class="intro-x font-bold text-2xl text-center xl:text-left mt-5">Data Retention</h1>
            <ul class="intro-x">
                <li class="list-disc">We retain your data for as long as necessary to fulfill the purposes for which it was collected or
                    as required by law.
                </li>
            </ul>

            <h1 class="intro-x font-bold text-2xl text-center xl:text-left mt-5">Your Data Rights</h1>
            <ul class="intro-x">
                <li class="list-disc">
                    You have the right to access, correct, delete, or export your personal information.To exercise these rights, please contact us at 09292216587.
                </li>
            </ul>

            <h1 class="intro-x font-bold text-2xl text-center xl:text-left mt-5">Cookies and Tracking</h1>
            <ul class="intro-x">
                <li class="list-disc">
                    We use cookies and tracking technologies to enhance your user experience. You can manage your cookie preferences through your browser settings.

                </li>
            </ul>

            <h1 class="intro-x font-bold text-2xl text-center xl:text-left mt-5">Policy Updates</h1>
            <ul class="intro-x">
                <li class="list-disc">
                    We may update this Privacy Policy from time to time. Any changes will be posted on our website,and the updated policy will be effective upon posting.
                </li>
            </ul>


            <h1 class="intro-x font-bold text-2xl text-center xl:text-left mt-5">Contact Us</h1>
            <p class="text-justify intro-x">If you have questions or concerns regarding your privacy or this Privacy Policy, please contact us at
                09292216587.
            </p>

        </div>
    </div>
</div>

<script>
    // Add a click event listener to the "Register" button
    document.getElementById("registerButton").addEventListener("click", function () {
        // Check if the checkbox is unchecked
        if (!document.getElementById("remember-me").checked) {
            // If unchecked, trigger the modal with data-toggle and data-target
            document.querySelector('[data-target="#agree"]').click();
        }
    });

     // Add a click event listener to the "I Agree" button
     document.getElementById("iagree").addEventListener("click", function () {
        // Check the "remember-me" checkbox
        document.getElementById("remember-me").checked = true;

    });
</script>
@endsection