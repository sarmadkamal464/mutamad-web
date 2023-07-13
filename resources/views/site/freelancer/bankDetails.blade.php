
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
   <style>
    .error-message {
            color: red;
        }
   </style>
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
                            <label class="error-message"  id="already-message" for="#">
                        Account details already exist
                                            </label>
                                <h4>Account holder bank information</h4>
                                <hr>
                                <div class="wt-accountdel">
                                    <form class="wt-formtheme wt-userform" 
                                        action="{{ url('') }}/freelancer-account" method="POST" id="create-customer-form" role="form">

                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <fieldset class="container">
                                            <div class="form-group form-group ">
                                                <label class="form-label" for="name">Account owner<span
                                                        class="label-required">*</span></label>
                                                <input id="name" type="text" name="name" class="form-control">
                                            </div>
                                            <div class="form-group form-group ">
                                                <label class="form-label" for="email">Owner's Email<span
                                                        class="label-required">*</span></label>
                                                <input id="email" type="email" name="email" class="form-control">
                                            </div>
                                            <div class="form-group form-group ">
                                                <label class="form-label" for="accountNumber">Account Number<span
                                                        class="label-required">*</span></label>
                                                <input id="accountNumber" type="text" name="accountNumber"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group form-group ">
                                                <label class="form-label" for="routingNumber">Routing Number<span
                                                        class="label-required">*</span></label>
                                                <input id="routingNumber" type="text" name="routingNumber"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group form-group ">
                                                <label class="form-label" for="accountHolderName">Account Holder Name<span
                                                        class="label-required">*</span></label>
                                                <input id="accountHolderName" type="text" name="accountHolderName"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group form-group ">
                                                <label class="form-label" for="bankName">Bank Name<span
                                                        class="label-required">*</span></label>
                                                <input id="bankName" type="text" name="bankName" class="form-control">
                                            </div>
                                          
                                            <div class="form-group form-group-half wt-btnarea ">
                                                <button  id="submit-button" type="submit"
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
         document.addEventListener("DOMContentLoaded", function() {
            getBankDetails();
        });

        function getBankDetails() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = "{{ url('') }}/bank/freelancer-account/{{ Auth::user()->id }}";

            $.ajax({
    url: url,
          
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                 
                        const data= response.freelancer_account;
                        var form = document.getElementById('create-customer-form');
                        form.name.value=data.account_name;
                     form.email.value= data.email  ;
                     form.bankName.value = data.bank_name ;
                     form.accountNumber.value = data.account_number ;
                     form.routingNumber.value = data.routing_number;
                     form.accountHolderName.value = data.account_name ;
        
                 const submitBtn = document.getElementById("submit-button");
        submitBtn.style.display = "none";
                    } else {
                        document.getElementById('already-message').style.display = 'none';
                    }
                },
                error: function(response) {
                    console.log(response);
                    document.getElementById('already-message').style.display = 'none';
           }
            });
        }
        document.addEventListener("DOMContentLoaded", function() {
            const submitBtn = document.getElementById("submit-button");
            submitBtn.style.cursor = "pointer";
        });
        var form = document.getElementById('create-customer-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            var data = {
            
                name: form.name.value,
                email: form.email.value,
                bank_name: form.bankName.value,
                account_number: form.accountNumber.value,
                routing_number: form.routingNumber.value,
                account_name: form.accountHolderName.value,
                id: form.user_id.value 
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = "{{ url('') }}/freelancer-account";
  

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
        if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
            errorMessage = jqXHR.responseJSON.message;
        } else if (errorThrown) {
            errorMessage = errorThrown;
        }

        $.toast({
            text: errorMessage,
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
