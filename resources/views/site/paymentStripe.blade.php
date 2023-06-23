@extends('site.layout')
@section('title', 'Mutamad')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .error-message {
            color: red;
        }

        .input-group-append {
            position: absolute;
            right: 0;
            top: -40px;
            bottom: 40px;
            opacity: 0.7;
        }

        .input-group-text.text-muted {
            background: none;
            border: none;
        }

        body {
            background-color: #f6f9fb !important;
        }

        .text-small {
            font-size: 0.9rem;
        }

        .rounded {
            border-radius: 1rem;
        }

        #loader {
            display: none;
            position: fixed;
            z-index: 999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
        }

        #loader:after {
            content: "";
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 60px;
            height: 60px;
            margin: -30px 0 0 -30px;
            border-radius: 50%;
            border: 6px solid #f3f3f3;
            border-top-color: #3498db;
            animation: spin 1s ease-in-out infinite;
        }

        @@keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }


        @media (min-width: 769px) {
            .wt-main {
                padding-top: 100px;
            }
        }
    </style>
    <script src="https://js.stripe.com/v2/"></script>
@endsection

@section('content')

    <!--Main Start-->
    <main id="wt-main" class="wt-main wt-haslayout">
        <!-- FOR DEMO PURPOSE -->
        <div class="container py-4">

            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="bg-white rounded-lg shadow-sm p-5">
                        <!-- Credit card form tabs -->
                        <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                            <i class="fa fa-credit-card"></i>
                            Credit Card
                        </a>
                        <!-- End -->
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->
                            <div id="nav-tab-card" class="tab-pane fade show active">

                                <form method="POST" id="create-customer-form"
                                    action="{{ route('stripe.create-customer') }}" role="form">
                                    <div class="form-group">

                                        <label for="username">Full name (on the card)</label>
                                        <input type="text" name="username" id='username' placeholder="Username" required
                                            class="form-control">
                                    </div>
                                    <div class="form-group">

                                        <label for="email">Email</label>
                                        <input type="email" name="email" id='email' placeholder="Email" required
                                            class="form-control">
                                    </div>
                                    <!-- <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="card-holder-email" name="email" class="form-control"
                                                            placeholder="email@example.com" style=" margin-bottom:12px;" required>

                                                    </div> -->
                                    <div class="form-group">
                                        <label for="cardNumber">Card number</label>
                                        <div class="input-group">
                                            <input type="number" id="card-number" name="cardNumber" class="form-control"
                                                placeholder="1234 1234 1234 1234" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text text-muted">
                                                    <i class="fa fa-cc-visa mx-1"></i>

                                                    <i class="fa fa-cc-mastercard mx-1"></i>
                                                </span>
                                            </div>

                                        </div>
                                        <label class="error-message" id="card-error-message" for="#">
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">Expiration</span></label>
                                                <div class="input-group">
                                                    <input type="number" id="card-expiry-month" pattern="/^-?\d+\.?\d*$/"
                                                        oninput="this.value = Math.abs(this.value.slice(0, 2)) || ''"
                                                        name="expirationMonth" placeholder="Exp Month" class="form-control"
                                                        required>

                                                    <input type="number" id="card-expiry-year" pattern="/^-?\d+\.?\d*$/"
                                                        oninput="this.value = this.value.slice(-2) || ''"
                                                        name="expirationYear" placeholder="Exp Year" class="form-control"
                                                        required>


                                                </div>
                                                <label class="error-message" id="expiry-error-message" for="#">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4">
                                                <label title="Three-digits code on the back of your card">CVV
                                                    <i class="fa fa-question-circle"></i>
                                                </label>
                                                <input type="number" id="card-cvc" pattern="/^-?\d+\.?\d*$/"
                                                    onKeyPress="if(this.value.length==4) return false;" name="cvc"
                                                    placeholder="CVC" class="form-control" required>

                                            </div>
                                            <label class="error-message" id="cvc-error-message" for="#">
                                            </label>
                                        </div>
                                    </div>
                                    <div id="loader"></div>


                                    <button id="submit-button" type="submit"
                                        class="subscribe btn btn-primary btn-block rounded-pill shadow-sm">Confirm</button>
                                </form>
                            </div>
                            <!-- End -->
                        </div>
                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')


    <script>
        // var stripe = Stripe(
        //     'pk_test_51MPKvAEniYgzUx4ZEA7Q6imlaGDykq9UQhKBpzGTKAmeaOkhQeSgVIvt3EgI7YCX5kFhJLfk1lpyjiNonksHII9300JsKD1l52'
        // ); // Stripe public key
        Stripe.setPublishableKey(
            'pk_test_51MPKvAEniYgzUx4ZEA7Q6imlaGDykq9UQhKBpzGTKAmeaOkhQeSgVIvt3EgI7YCX5kFhJLfk1lpyjiNonksHII9300JsKD1l52'
        );
        var customerId = '';

        document.addEventListener("DOMContentLoaded", function() {
            const submitBtn = document.getElementById("submit-button");
            submitBtn.style.cursor = "pointer";
        });

        const emailInput = document.getElementById('email');

        emailInput.addEventListener('input', () => {
            const email = emailInput.value;

            if (!isValidEmail(email)) {
                emailInput.setCustomValidity('Please enter a valid email address');
            } else {
                emailInput.setCustomValidity('');
            }
        });

        function isValidEmail(email) {
            // Regular expression to match the format of a valid email address
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        var cardNumber = document.getElementById("card-number");

        document.getElementById('card-number').addEventListener('input', function() {
            validateCardNumber(event);
        });

        document.getElementById('card-expiry-month').addEventListener('input', function() {
            validateExpiry(event);
        });

        document.getElementById('card-cvc').addEventListener('input', function() {
            validateCVC(event);
        });

        document.getElementById('card-expiry-year').addEventListener('input', function() {
            validateExpiry(event);
        });

        // validateCardNumber
        async function validateCardNumber(event) {
            let errorMessage = document.getElementById("card-error-message");
            var isValid = await Stripe.card.validateCardNumber(event.target.value);
            if (isValid) {
                document.getElementById("submit-button").disabled = false;
                errorMessage.textContent = "";
            } else {
                document.getElementById("submit-button").disabled = true;
                errorMessage.style.display = "block";
                errorMessage.textContent = "Your card number is invalid";
            }
        }

        // validateExpiry
        async function validateExpiry(event) {
            let errorMessage = document.getElementById("expiry-error-message");
            let card_expiry_month = $('#card-expiry-month').val() % 100;
            let card_expiry_year = $('#card-expiry-year').val() % 100;
            let card_expiry = card_expiry_month + '/' + card_expiry_year;
            $('#card-expiry-year').val(card_expiry_year);
            $('#card-expiry-month').val(card_expiry_month);
            var isValid = await Stripe.card.validateExpiry(card_expiry);

            if (isValid) {
                document.getElementById("submit-button").disabled = false;
                errorMessage.textContent = "";
            } else {
                document.getElementById("submit-button").disabled = true;
                errorMessage.style.display = "block";
                errorMessage.textContent = "Your card's expiration is in the past.";
            }
        }

        // validateCVC
        async function validateCVC(event) {
            let errorMessage = document.getElementById("cvc-error-message");
            var isValid = await Stripe.card.validateCVC(event.target.value);
            if (isValid) {
                document.getElementById("submit-button").disabled = false;
                errorMessage.textContent = "";
            } else {
                document.getElementById("submit-button").disabled = true;
                errorMessage.style.display = "block";
                errorMessage.textContent = "Your card's security code is invalid.";
            }
        }

        var form = document.getElementById('create-customer-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            var data = {
                id:Auth::user()->id,
                name: form.username.value,
                email: form.email.value,
                Number: form.cardNumber.value,
                ExpMonth: form.expirationMonth.value,
                ExpYear: form.expirationYear.value,
                Cvc: form.cvc.value,
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = '{{ url('') }}/stripepayment/create-customer';
  

            $.ajax({
                url: url,
                type: 'post',
                data: data,
                beforeSend: function() {
                    $('#loader').css('display', 'block');
                },
                success: function(res) {
                    const submitBtn = document.getElementById("submit-button");
                    submitBtn.style.backgroundColor = "#696969";
                    submitBtn.disabled = true;
                    $.toast({
                        text: 'Card Added',
                        heading: 'Success',
                        icon: 'success',
                        showHideTransition: 'slide',
                        allowToastClose: true,
                        hideAfter: 5000,
                        position: 'bottom-right',
                        textAlign: 'left',
                        loader: true,
                        loaderBg: 'green'
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Remove loader and show error message
                    var errorMessage =
                        'There was an error processing your request. Please try again later.';
                    if (jqXHR.responseJSON && jqXHR.responseJSON.error && jqXHR.responseJSON.error
                        .message) {
                        errorMessage = jqXHR.responseJSON.error.message;
                    } else if (errorThrown) {
                        errorMessage = errorThrown;
                    }

                    $.toast({
                        text: 'An internal error has occurred. If you continue to experience this, please contact your administrator.',
                        heading: 'Error',
                        icon: 'error',
                        showHideTransition: 'slide',
                        allowToastClose: true,
                        hideAfter: 5000,
                        position: 'bottom-right',
                        textAlign: 'left',
                        loader: true,
                        loaderBg: '#9EC600'
                    });

                },
                complete: function() {
                    $('#loader').css('display', 'none');

                    const submitBtn = document.getElementById("submit-button");
                    submitBtn.style.backgroundColor = "#0098d6";
                    submitBtn.disabled = false;


                }
            });
        });
    </script>



@endsection
