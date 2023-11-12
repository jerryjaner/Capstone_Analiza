@extends('layouts.guest')
@section('title')
Login | SRMS
@endsection
@section('content')
<style>

</style>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
        <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            <img alt="" class="-intro-x w-30 mx-auto" src="{{asset('img/logo.png')}}">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                Sign In
            </h2>
            <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account.</div>
            <div class="flex">
            <x-validation-errors class="intro-x mt-4 mx-auto" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-lg text-green-700">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error_message'))
                    <div class="mb-4 font-medium text-lg text-red-700">
                        {{ session('error_message') }}
                    </div>
                @endif
            </div>


            <div class="intro-x mt-8">
                <input type="text" class="intro-x login__input input input--lg border border-gray-300 block" name="email" value="{{old('email')}}" placeholder="Email">
                <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" name="password" placeholder="Password">
            </div>
            <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                <div class="flex items-center mr-auto">
                    <input type="checkbox" class="input border mr-2" id="remember-me">
                    <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                </div>
                <a href="">Forgot Password?</a>
            </div>
            {{-- old button --}}
            {{-- <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                <a href="{{route('register')}}" class="button button--lg w-full xl:w-32 text-white bg-theme-9 xl:mr-3 align-top w-100 float-left">Register</a>
                <button class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 align-top w-100 float-right">Login</button>

            </div> --}}
            <div class="intro-x mt-5">

                <button class="button button--lg w-full xl:w-50 text-white bg-theme-1 xl:mr-3 align-top w-100 mb-2">Login</button>
                <a  href="{{route('register')}}"class="button button--lg w-full xl:w-27 text-white bg-theme-9 align-top w-100 float-right mt-5">Register</a>
                <a  href="{{route('account.search')}}"class="button button--lg w-full xl:w-27 text-white bg-theme-7 align-top w-100 float-right mt-5 mb-5">Search Account</a>

            </div>


            <div class="intro-x mt-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-center xl:text-left">
                By signin up, you agree to our
                <br>
                <a class="text-theme-1 dark:text-theme-10" href="javascript:;" data-toggle="modal" data-target="#terms_and_condition">Terms and Conditions</a> & <a class="text-theme-1 dark:text-theme-10"  href="javascript:;" data-toggle="modal" data-target="#privacy_policy">Privacy Policy</a>
            </div>


        </div>
    </div>
</form>

{{-- Terms and Condition Modal --}}
<div class="modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" id="terms_and_condition">
    <div class="w-full max-w-4xl max-h-full mx-auto">
        <div class="p-10 bg-white rounded-lg shadow dark:bg-gray-700">
            <h1 class="intro-x font-bold text-2xl text-center xl:text-left">Terms & Condition</h1>
            <p class="text-justify intro-x">Welcome to Web Based Service Request Management System, By using our website and/or using the
                services that are provided, you acknowledge that you have read, understood, and agree to be bound by
                our Terms and Conditions. These Terms and Conditions unconditionally extend and apply to all related
                applications, internet service, or website extensions. If you are not in agreement with all of these Terms
                and Conditions, you are prohibited from using this Website, and you may discontinue use immediately.
                Web Based Service Request Management System recommends that you save or print a copy of these
                Terms and Conditions for future reference</p>

            <h1 class="intro-x font-bold text-2xl text-center xl:text-left mt-5">Agreement to Terms and Conditions</h1>
            <p class="text-justify intro-x">
                Web Based Service Request Management System Terms And Conditions (these &quot;Terms&quot; or these &quot;Terms
                and Conditions&quot;) contained in this Agreement shall govern your use of this Website and all its content
                (collectively referred to herein as this &quot;Website&quot;) These Terms outline the rules and regulations guiding
                the use of Web Based Service Request Management System, located at (WEBSITE URL) All
                materials/information/documents/services or all other entities (collectively referred to as content) that
                appear on the [Web Based Service Request Management System] shall be administered subject to these
                Terms and Conditions. These Terms and Conditions apply in full force and effect to your use of this
                Website, and the use of this Website constitutes an express agreement with all the terms and conditions
                contained herein in full. Do not continue to use this Website if you have any objection to any of the
                Terms and Conditions stated on this page.
            </p>

            <h1 class="intro-x font-bold text-2xl text-center xl:text-left mt-5">Definitions/Terminology</h1>
            <p class="text-justify intro-x">The following definitions apply to these Terms and Conditions, Privacy Statement, Disclaimer Notice and
                all Agreements &quot;User&quot; &quot;Visitor,&quot; &quot;Client&quot; &quot;Customer,&quot; &quot;You&quot; and &quot;Your&quot; refers to you the person(s) that
                use this Website Web Based Service Request Management System &quot;, &quot;We&quot;, &quot;Our&quot; and &quot;Us&quot; refers to our
                Website/Company &quot;Party&quot; &quot;Parties&quot; or &quot;Us&quot; refers to both you and us. All terms refer to all
                considerations of Web Based Service Request Management System, necessary to undertake support to
                you for the express purpose of meeting your User needs in respect of our services, under and subject to
                prevalling law of the state or country in which Web Based Service Request Management System
                operates (Bulan, Sorsogon). Any use of these definitions or other glossary in the singular plural,
                capitalization, and/or pronoun are interchangeable but refer to the same
            </p>

            <h1 class="intro-x font-bold text-2xl text-center xl:text-left mt-5">POLICIES, PRACTICES, STANDARDS, GUIDELINES AND PROCEDURES ON CREATING AN ACCOUNT IN WEB-BASED SERVICE REQUEST MANAGEMENT SYSTEM</h1>

            <h3 class="intro-x font-bold text-lg xl:text-left mt-5">POLICY:</h3>
            <p  class="text-justify intro-x">User must age at least 18 years old above, and user must use their active email and phone numbers to receive an email or sms for the verification account.</p>

            <h3 class="intro-x font-bold text-lg xl:text-left mt-5"> STANDARDS:</h3>
            <ul class="intro-x">
                <li class="list-disc">User must enter their date of birth</li>
                <li class="list-disc">User must agree in terms and treating an account.</li>
                <li class="list-disc">User name must be unique.</li>
                <li class="list-disc">Username must consist 6-10 characters long that consist of least one upper case letter.</li>
                <li class="list-disc">Creak a password with at least 6-12 characters with one lower case and uppercase letter then it must consist special characters.</li>
                <li class="list-disc">User must provide the needed information in creating an account.</li>
            </ul>

            <h3 class="intro-x font-bold text-lg xl:text-left mt-5">PRACTICES:</h3>
            <ul class="intro-x">
                <li class="list-disc">Never use personal Information such as birthday, your name, username when creating password.</li>
                <li class="list-disc">Don't use the same password for each accounts.</li>
                <li class="list-disc">Try to includes numbers, symbols, lower case and uppercase letters, and special characters.</li>
                <li class="list-disc">Your usemame should be simple enough to remember but hard to guess.</li>
                <li class="list-disc">Use strong and long pace word.</li>
            </ul>

            <h3 class="intro-x font-bold text-lg xl:text-left mt-5">GUIDELINES:</h3>
            <ul class="intro-x">
                <li class="list-disc">Always log out of your account when finished using the service.</li>
                <li class="list-disc">Regularly update your password and keep it confidential.</li>
                <li class="list-disc">Do not share your account information with others.</li>
                <li class="list-disc">Report any suspicious activity or unauthorized access to the service provider immediately</li>
                <li class="list-disc">Keep your email and phone number updated in case of any account recovery or verification needs.</li>
                <li class="list-disc">Be aware of phishing scams and verify the authenticity of any emails or messages claiming to be from
                    the service provider.</li>
                <li class="list-disc">Be mindful of the information you share on your account and avoid sharing sensitive or confidential
                    information.</li>
            </ul>

            <h3 class="intro-x font-bold text-lg xl:text-left mt-5">PROCEDURES:</h3>
            <ul class="intro-x">
                <li class="list-decimal">On a dashboard kindly select the sign in button to create account</li>
                <li class="list-decimal">Provide your complete name, account number, address, email address, and phone number, date of
                    birth and sex on the application form and also a landmark that indicates your espicific location that
                    helps us to find your location faster.</li>
                <li class="list-decimal">When it is completed select the next button for creating your username and password.</li>
                <li class="list-decimal">Then enter your preferred usemame then click the next button to check if your usemame was already
                    taken.</li>
                <li class="list-decimal">After creating username, enter your password and then click submit.</li>
                <li class="list-decimal">After that you will receive an email or sms from your email or phone number for the accounts
                    approval.</li>
                <li class="list-decimal">Then when your account was approved then you can now log in to the Service Request Management
                    System of Water District of Bulan, Sorsogon.</li>
            </ul>

        </div>
    </div>
</div>

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


@endsection
