@extends('site.layout')
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
    {{-- Start Content Here --}}
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <div class="wt-haslayout wt-main-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h2>Sign up</h2>
                                <div class="wt-accountdel">
                                    @include('site.shared.message')
                                    <form class="wt-formtheme wt-userform" method="POST" action="{{ url('signup') }}">
                                        @csrf
                                        <fieldset>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="name">Name<span st><span
                                                            class="label-required"><span class="label-required">
                                                                *</span></label>
                                                <input id="name" type="text" name="name" class="form-control"
                                                    placeholder="Name" value="{{ isset($name) ? $name : '' }}" required>
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="username">Username<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                <input id="username" type="text" name="username" class="form-control"
                                                    placeholder="Username" required>
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Email<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                <input id="email" type="email" name="email" class="form-control"
                                                    placeholder="Email" value="{{ isset($email) ? $email : '' }}">
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="password">Password<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                <div class="password-wrapper">
                                                    <input id="password" type="password" name="password"
                                                        class="form-control" placeholder="Password" required> <span
                                                        id="toggle-password" class="toggle-password"><i
                                                            class="fa fa-eye"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="password_confirmation">Confirm Password<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                <div class="password-wrapper">
                                                    <input id="confirm" type="password" name="password_confirmation"
                                                        class="form-control" placeholder="Confirm Password" required>
                                                    <span id="toggle-password2" class="toggle-password"><i
                                                            class="fa fa-eye"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group" id="categoryDiv">
                                                <label class="form-label" for="category">Category<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                <span class="wt-select">
                                                    <select id="category" name="category" required>
                                                        <option disabled selected value="">Select category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="country">Country<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                <span class="wt-select">
                                                    <select id="country" name="country" required>
                                                        <option disabled selected value="">Select country</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country['code'] }}">{{ $country['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Signup as<span class="label-required"><span
                                                            class="label-required"> *</span></label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="role"
                                                        id="freelancer" value="freelancer">
                                                    <label class="form-check-label" for="freelancer">Freelancer</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="role"
                                                        id="client" value="client">
                                                    <label class="form-check-label" for="client">Client</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-half wt-btnarea">
                                                <button type="submit" class="wt-btn singupBtn  wt-btn-sm">Sign
                                                    up</button>
                                            </div>
                                        </fieldset>
                                        <div class="text-center">
                                            <p>Sign up with</p>
                                            <a class="btn text-white" style="background-color: #3b5998;"
                                                href="{{ url('login/facebook') }}" role="button">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a class="btn text-white" style="background-color: #dd4b39;"
                                                href="{{ url('login/google') }}" role="button">
                                                <i class="fab fa-google"></i>
                                            </a>
                                            <a class="btn text-white" style="background-color: #0082ca;"
                                                href="{{ url('login/linkedin') }}" role="button">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                            <div class="mt-3">
                                                Already have an account?
                                                <a href="{{ url('/login') }}">
                                                    Log in
                                                </a>
                                            </div>
                                        </div>
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
    <script>
        // Reset selected value of dropdown menu when page is loaded
        $(window).on('load', function() {
            $('input').attr('autocomplete', 'off');
        });
        //toggle category
        $('input[name="role"]').change(function() {
            if ($(this).val() === 'freelancer' && $(this).is(':checked')) {
                $('#categoryDiv').show();
                $('#categoryDiv select').prop('disabled', false);
                $('#categoryDiv select').attr('name', 'category');
            } else {
                $('#categoryDiv').hide();
                $('#categoryDiv select').prop('disabled', true);
                $('#categoryDiv select').removeAttr('name');
            }
        });

        $('input[type="password"]').on('input', function() {
            let input = document.getElementById('confirm');
            if ($('#confirm').val() != $('#password').val())
                input.setCustomValidity("Password and Confirm Password do not match");
            else
                input.setCustomValidity("");
        });
        // Get the password input element and the toggle-password icon element
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm');
        const togglePasswordIcon = document.getElementById('toggle-password');
        const confirmTogglePasswordIcon = document.getElementById('toggle-password2');

        // Add a click event listener to the toggle-password icon
        togglePasswordIcon.addEventListener('click', function() {
            // Toggle the active class on the toggle-password icon
            togglePasswordIcon.classList.toggle('active');

            // If the password input is of type password, change it to text; otherwise, change it back to password
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }

            // If the toggle-password icon is active, hide the password after 3 seconds
            if (togglePasswordIcon.classList.contains('active')) {
                setTimeout(function() {
                    passwordInput.type = 'password';
                    togglePasswordIcon.classList.remove('active');
                }, 3000);
            }
        });
        // Add a click event listener to the toggle-password icon
        confirmTogglePasswordIcon.addEventListener('click', function() {
            // Toggle the active class on the toggle-password icon
            confirmTogglePasswordIcon.classList.toggle('active');


            // If the password input is of type password, change it to text; otherwise, change it back to password
            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
            } else {
                confirmPasswordInput.type = 'password';
            }

            // If the toggle-password icon is active, hide the password after 3 seconds
            if (confirmTogglePasswordIcon.classList.contains('active')) {
                setTimeout(function() {
                    confirmPasswordInput.type = 'password';
                    confirmTogglePasswordIcon.classList.remove('active');
                }, 3000);
            }
        });
    </script>
@endsection
