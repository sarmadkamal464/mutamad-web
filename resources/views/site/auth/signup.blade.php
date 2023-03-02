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
                                    <form class="wt-formtheme wt-userform">
                                        <fieldset>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Name</label>
                                                <input id="name" type="text" name="name" class="form-control"
                                                    placeholder="Name">
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Username</label>
                                                <input id="username" type="text" name="username" class="form-control"
                                                    placeholder="Username">
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Email</label>
                                                <input id="email" type="email" name="email" class="form-control"
                                                    placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="category">Category</label>
                                                <span class="wt-select">
                                                    <select id="category">
                                                        <option value="" disabled="">Category
                                                        </option>
                                                        <option value="">one</option>
                                                        <option value="">Two</option>
                                                    </select>
                                                </span>
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="password">Password</label>
                                                <input id="password" type="password" name="password" class="form-control"
                                                    placeholder="Password">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="category">Country</label>
                                                <span class="wt-select">
                                                    <select id="category">
                                                        <option value="" disabled="">Country
                                                        </option>
                                                        <option value="">one</option>
                                                        <option value="">Two</option>
                                                    </select>
                                                </span>
                                            </div>
                                            <div class="form-group form-group-half wt-btnarea">
                                                <a href="javascript:void(0);" class="wt-btn">Sign Up</a>
                                            </div>
                                        </fieldset>
                                        <div class="text-center">
                                            <p>Sign up with</p>
                                            <button type="button" class="btn btn-secondary btn-floating mx-1">
                                                <i class="fab fa-facebook-f"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary btn-floating mx-1">
                                                <i class="fab fa-google"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary btn-floating mx-1">
                                                <i class="fab fa-twitter"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary btn-floating mx-1">
                                                <i class="fab fa-github"></i>
                                            </button>
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
