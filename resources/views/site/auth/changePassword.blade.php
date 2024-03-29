@extends('site.layout')
@section('title', 'Change Password')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <style>
        @media (min-width: 720px) {
            .wt-main {
                padding: 133px 0 0px 0;
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
                                <h2>Change Password</h2>
                                <div class="wt-accountdel">
                                    @include('site.shared.message')
                                    <form action="{{ url('changePassword') }}" method="POST"
                                        class="wt-formtheme wt-userform">
                                        @csrf
                                        <fieldset>
                                            <input type="hidden" name="resetToken" value="{{ $token }}">
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">New Password <span
                                                        style="color: red;"> *</span></label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Password">
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Confirm New Password <span
                                                        style="color: red;"> *</span></label>
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>
                                            <div>
                                                <div class="form-group form-group-half wt-btnarea">
                                                    <button class="wt-btn">Update</button>
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
