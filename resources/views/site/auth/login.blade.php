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
                                    <form class="wt-formtheme wt-userform">
                                        <fieldset>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Email</label>
                                                <input id="email" type="email" name="email" class="form-control"
                                                    placeholder="Email">
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="password">Password</label>
                                                <input id="password" type="password" name="password" class="form-control"
                                                    placeholder="Password">
                                            </div>
                                            <div>
                                                <div class="form-group form-group-half wt-btnarea">
                                                    <a href="javascript:void(0);" class="wt-btn">Login</a>
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