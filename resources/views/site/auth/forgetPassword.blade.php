@extends('site.layout')
@section('title', 'Forget Password')
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
                                <h2>Forget Password</h2>
                                <div class="wt-accountdel">
                                    <form action="{{ url('request-forget-password') }}" method="POST"
                                        class="wt-formtheme wt-userform">
                                        <fieldset>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Enter your Email</label>
                                                <input id="email" type="email" name="email" class="form-control"
                                                    placeholder="Email">
                                            </div>
                                            <div>
                                                <div class="form-group form-group-half wt-btnarea">
                                                    <button class="wt-btn">Send Email</button>
                                                </div>
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
