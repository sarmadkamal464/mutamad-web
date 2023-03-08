@extends('site.layout')
@section('title', 'Signup')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
@endsection
@section('content')
    {{-- Start Content Here --}}
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <div class="wt-haslayout wt-main-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h2>Sign up</h2>
                                <div class="wt-accountdel">
                                    @include('site.shared.message')
                                    <form class="wt-formtheme wt-userform" method="POST" action="{{ url('signup') }}">
                                        @csrf
                                        <fieldset>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Name*</label>
                                                <input id="name" type="text" name="name" class="form-control"
                                                    placeholder="Name" value="{{ isset($name) ? $name : '' }}" required>
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Username*</label>
                                                <input id="username" type="text" name="username" class="form-control"
                                                    placeholder="Username" required>
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Email*</label>
                                                <input id="email" type="email" name="email" class="form-control"
                                                    placeholder="Email" value="{{ isset($email) ? $email : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="category">Category*</label>
                                                <span class="wt-select">
                                                    <select id="category" name="category" required>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="password">Password*</label>
                                                <input id="password" type="password" name="password" class="form-control"
                                                    placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="country">Country*</label>
                                                <span class="wt-select">
                                                    <select id="country" name="country" required>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country['name'] }}">{{ $country['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Signup as*</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="role"
                                                        id="freelancer" value="freelancer" required>
                                                    <label class="form-check-label" for="freelancer">Freelancer</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="role"
                                                        id="client" value="client">
                                                    <label class="form-check-label" for="client">Client</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-half wt-btnarea">
                                                <button type="submit" class="wt-btn  wt-btn-sm">Sign Up</button>
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
                                                    Login
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
            $('#category').val('');
            $('#country').val('');
        });
    </script>
@endsection