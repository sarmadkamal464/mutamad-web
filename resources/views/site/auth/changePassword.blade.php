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
                                    <form class="wt-formtheme wt-userform">
                                        <fieldset>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Current Password</label>
                                                <input id="currentPassword" type="password" name="password"
                                                    class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group form-group">
                                                <label class="form-label" for="email">Conform Password</label>
                                                <input id="conformPassword" type="password" name="password"
                                                    class="form-control" placeholder="Password">
                                            </div>
                                            <div>
                                                <div class="form-group form-group-half wt-btnarea">
                                                    <a href="javascript:void(0);" class="wt-btn">Conform</a>
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
