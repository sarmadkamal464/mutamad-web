@extends('site.layout')
@section('title', 'Login')
@section('position', 'absolute')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <style>
        @media (min-width: 720px) {
            .wt-main {
                padding: 93px 0 10px 0;
            }
        }

        @media (max-width: 360px) {
            .wt-btn-sm {
                padding: 0px 15px !important;
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
                                <h2>Login</h2>
                                <div class="wt-accountdel">
                                    @include('site.shared.message')
                                    <form action="{{ url('login') }}" method="POST" class="wt-formtheme wt-userform">
                                        @csrf
                                        <fieldset>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Email or Username<span
                                                        style="color: red;"> *</span></label>
                                                <input id="email" type="text" name="email" class="form-control"
                                                    placeholder="Email" value="{{ isset($email) ? $email : '' }}" required>
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="password">Password<span style="color: red;">
                                                        *</span></label>
                                                <input id="password" type="password" name="password" class="form-control"
                                                    placeholder="Password" required>
                                            </div>
                                            <div>
                                                <div class="form-group form-group-half wt-btnarea">
                                                    <button class="wt-btn wt-btn-sm ">Log in</button>
                                                </div>
                                                <div class="float-right ">
                                                    <a href="{{ url('forgetPassword') }}">
                                                        Forgot Password?
                                                    </a>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <div class="text-center">
                                        <div class="mt-3 mb-4">
                                            Don't have Mutamad account yet?
                                            <a href="{{ url('/signup') }}">
                                                Create one
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
