{{-- @extends('site.layout')
@section('title', 'Signup')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <style>
        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .toggle-password i {
            font-size: 18px;
            color: #999;
        }

        .toggle-password.active i:before {
            content: "\f070";
        }

        @media (max-width: 760px) {
            .wt-main-section {
                padding: 40px 0;
            }
        }
    </style>
@endsection
@section('content')
  Start Content Here 
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <div class="wt-haslayout wt-main-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Account holder bank information</h4>
                                <hr>
                                <div class="wt-accountdel">
                                   
                                    <form class="wt-formtheme wt-userform">
                                        @csrf
                                        <fieldset class=" container">
                                        <div class="form-group form-group row">
                                                <label class="form-label" for="swiftCode">SWIFT Code<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                          
                                                <input id="swiftCode" type="txt" name="swiftCode" class="form-control"
                                                   >
                                            </div>
                                        <div class="form-group form-group row">
                                                <label class="form-label" for="ibanNumber">IBAN Number<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                            <p>IBAN is different than account number and many way by country</p>
                                                <input id="ibanNumber" type="txt" name="ibanNumber" class="form-control"
                                                   >
                                            </div>
                                            <div class="row">
                                            <div class="form-group form-group col-md-6">
                                            <label class="form-label" for="postCode">Post Code<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                            <p>Please enter the post code associated with your account</p>
                                                <input id="postCode" type="number" name="postCode" class="form-control"
                                                   >
                                            </div>
                                            <div class="form-group form-group col-md-6">
                                            
                                                <label class="form-label" for="category">Bank Account Type<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                            <p>Type of bank Account</p>
                                                <span class="wt-select">
                                                    <select id="category" name="category" required>
                                                        <option disabled selected value="">Please select...</option>
                                                      
                                                            <option value="hh">'hh'
                                                            </option>
                                                       
                                                    </select>
                                                </span>
                                           
                                            </div>
                                            </div>
                                      
                                        
                                        
                                        <div class="form-group form-group row">
                                                <label class="form-label" for="bankName">Branch Name<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                            <p>Name of the bank branch</p>
                                                <input id="bankName" type="txt" name="bankName" class="form-control"
                                                   >
                                            </div>
                                            <div class="row">
                                            <div class="form-group form-group col-md-6">
                                                <label class="form-label" for="fname">First Name<span
                                                            class="label-required"><span class="label-required">
                                                                *</span></label>
                                                <input id="fname" type="text" name="fname" class="form-control"
                                                     required>
                                            </div>
                                            <div class="form-group form-group  col-md-6">
                                                <label class="form-label" for="lname">Last Name<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                <input id="lname" type="text" name="lname" class="form-control"
                                                     required>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="form-group form-group col-md-6">
                                                <label class="form-label" for="dob">DOB<span
                                                            class="label-required"><span class="label-required">
                                                                *</span></label>
                                                <input id="dob" type="date" name="dob" class="form-control"
                                                     required>
                                            </div>
                                            <div class="form-group form-group  col-md-6">
                                                <label class="form-label" for="nameOnAccount">Name on account<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                <input id="nameOnAccount" type="text" name="nameOnAccount" class="form-control"
                                                     required>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="form-group form-group col-md-6">
                                                <label class="form-label" for="city">City and state/province<span
                                                            class="label-required"><span class="label-required">
                                                                *</span></label>
                                                <input id="city" type="date" name="city" class="form-control"
                                                     required>
                                            </div>
                                            <div class="form-group form-group  col-md-6">
                                            <label class="form-label" for="country">Country<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                
                                                <span class="wt-select">
                                                    <select id="country" name="country" required>
                                                        <option disabled selected value="">Select country</option>
                                                      
                                                            <option value="hh">'hh'
                                                            </option>
                                                       
                                                    </select>
                                                </span>
                                            </div>
                                            </div>
                                            <div class="form-group form-group row">
                                                <label class="form-label" for="address">Address<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                            <p>Please enter the physical address associated with this account. if the postal address where you receive mail is different 
                                                                than the physical address where you reside, our bank requires you enter the physical address
                                                            </p>
                                                <input id="address" type="txt" name="address" class="form-control"
                                                   >
                                            </div>
                                        
                                          
                                            <div class="row">
                                            <div class="form-group form-group col-md-6">
                                                <label class="form-label" for="phone">Phone number<span
                                                            class="label-required"><span class="label-required">
                                                                *</span></label>
                                                <input id="phone" type="number" name="phone" class="form-control"
                                                     required>
                                            </div>
                                          
                                            </div>
                                            
                                          
                                            <div class="form-group form-group-half wt-btnarea row">
                                                <button type="submit" class="wt-btn singupBtn  wt-btn-sm">Submit</button>
                                            </div>
                                        </fieldset>
                                      
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')

@endsection
 --}}
@extends('site.layout')
@section('title', 'Signup')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Add any additional stylesheets here -->
@endsection
@section('content')
    {{-- Start Content Here --}}
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <div class="wt-haslayout wt-main-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Account holder bank information</h4>
                                <hr>
                                <div class="wt-accountdel">
                                    <form class="wt-formtheme wt-userform" id="bankAccountForm"
                                        action="{{ route('addFreelancerAccount') }}" method="POST">

                                        @csrf
                                        <fieldset class="container">
                                            <div class="form-group form-group row">
                                                <label class="form-label" for="name">Account owner<span
                                                        class="label-required">*</span></label>
                                                <input id="name" type="text" name="name" class="form-control">
                                            </div>
                                            <div class="form-group form-group row">
                                                <label class="form-label" for="email">Owner's Email<span
                                                        class="label-required">*</span></label>
                                                <input id="email" type="email" name="email" class="form-control">
                                            </div>
                                            <div class="form-group form-group row">
                                                <label class="form-label" for="accountNumber">Account Number<span
                                                        class="label-required">*</span></label>
                                                <input id="accountNumber" type="text" name="accountNumber"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group form-group row">
                                                <label class="form-label" for="routingNumber">Routing Number<span
                                                        class="label-required">*</span></label>
                                                <input id="routingNumber" type="text" name="routingNumber"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group form-group row">
                                                <label class="form-label" for="accountHolderName">Account Holder Name<span
                                                        class="label-required">*</span></label>
                                                <input id="accountHolderName" type="text" name="accountHolderName"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group form-group row">
                                                <label class="form-label" for="bankName">Bank Name<span
                                                        class="label-required">*</span></label>
                                                <input id="bankName" type="text" name="bankName" class="form-control">
                                            </div>
                                            <div class="form-group form-group row">
                                                <label class="form-label" for="card-element">Card Details<span
                                                        class="label-required">*</span></label>
                                                <div id="card-element"></div>
                                            </div>
                                            <div class="form-group form-group-half wt-btnarea row">
                                                <button type="button" id="submitBtn"
                                                    class="wt-btn singupBtn wt-btn-sm">Submit</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe(
            'pk_test_51MPKvAEniYgzUx4ZEA7Q6imlaGDykq9UQhKBpzGTKAmeaOkhQeSgVIvt3EgI7YCX5kFhJLfk1lpyjiNonksHII9300JsKD1l52'
        );
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var elements = stripe.elements();
            var form = document.getElementById('bankAccountForm');
            var submitBtn = document.getElementById('submitBtn');

            // Handle form submission
            submitBtn.addEventListener('click', function(event) {
                event.preventDefault();

                // Disable the submit button to prevent multiple clicks
                submitBtn.disabled = true;
                submitBtn.textContent = 'Processing...';



                stripe.createToken('bank_account', {
                    country: 'US',
                    currency: 'usd',
                    routing_number: routingNumber.toString(),
                    account_number: accountNumber.toString(),
                    account_holder_name: accountHolderName.toString(),
                    account_holder_type: 'individual'
                }).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error
                        console.error('Token error: ', result.error.message);

                        // Re-enable the submit button
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Submit';
                    } else {
                        // Set the Stripe token in the hidden input field
                        var stripeToken = result.token.id;
                        var formData = new FormData(form);
                        formData.append('stripeToken', stripeToken);

                        // Send the form data using AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '{{ route('addFreelancerAccount') }}');
                        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    var response = JSON.parse(xhr.responseText);
                                    if (response.success) {
                                        // Success: Handle the response
                                        console.log(response.message);
                                        console.log(response.bankAccountId);
                                    } else {
                                        // Error: Handle the response
                                        console.error(response.message);
                                    }
                                } else {
                                    // Error: Handle the AJAX request
                                    console.error('AJAX request failed');
                                }

                                // Re-enable the submit button
                                submitBtn.disabled = false;
                                submitBtn.textContent = 'Submit';
                            }
                        };
                        xhr.send(formData);
                    }
                });
            });
        });
    </script>
@endsection
