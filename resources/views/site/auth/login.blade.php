@extends('site.layout')
@section('title', 'Login')
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
                                <h2>Login</h2>
                                <div class="wt-accountdel">
                                    @include('site.shared.message')
                                    <form action="{{ url('login') }}" method="POST" class="wt-formtheme wt-userform">
                                        @csrf
                                        <fieldset>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Email or Username</label>
                                                <input id="email" type="text" name="email" class="form-control"
                                                    placeholder="Email" value="{{ isset($email) ? $email : '' }}">
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="password">Password</label>
                                                <input id="password" type="password" name="password" class="form-control"
                                                    placeholder="Password">
                                            </div>
                                            <div>
                                                <div class="form-group form-group-half wt-btnarea">
                                                    <button class="wt-btn">Login</button>
                                                </div>
                                                <div class="float-right ">
                                                    <a href="{{ url('forgetPassword') }}">
                                                        Forgot Password?
                                                    </a>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="text-center">
                                            <p>Or login with</p>
                                            <a href="{{ url('/login/facebook') }}"><button type="button"
                                                    class="btn btn-secondary btn-floating mx-1">
                                                    <i class="fab fa-facebook-f"></i>
                                                </button></a>
                                            <a href="{{ url('/login/google') }}"><button type="button"
                                                    class="btn btn-secondary btn-floating mx-1">
                                                    <i class="fab fa-google"></i>
                                                </button></a>
                                            <a href="{{ url('/login/linkedin') }}"><button type="button"
                                                    class="btn btn-secondary btn-floating mx-1">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </button></a>
                                            <div class="mt-3">
                                                Don't have an Mutamad account?<br>
                                                <a href="{{ url('/signup') }}">
                                                    Create one
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
