@extends('site.layout')
@section('title', 'Change Password')
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
                                <h2>Change Password</h2>
                                <div class="wt-accountdel">
                                    @include('site.shared.message')
                                    <form action="{{ url('changePassword') }}" method="POST"
                                        class="wt-formtheme wt-userform">
                                        @csrf
                                        <fieldset>
                                            <input type="hidden" name="resetToken" value="{{ $token }}">
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">New Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Password">
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Confirm New Password</label>
                                                <input type="password" name="password_confirmation" class="form-control" ">
                                                </div>
                                                <div>
                                                    <div class="form-group form-group-half wt-btnarea">
                                                        <button class="wt-btn">Change Password</button>
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
