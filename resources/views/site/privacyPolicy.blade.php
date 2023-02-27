@extends('site.layout')
@section('title', 'Privacy Policy')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
@endsection
@section('content')

    <!--Inner Home Banner Start-->
    <div class="wt-haslayout wt-innerbannerholder">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                    <div class="wt-innerbannercontent">
                        <div class="wt-title">
                            <h2>Terms &amp; Conditions</h2>
                        </div>
                        <ol class="wt-breadcrumb">
                            <li><a href="{{ url('') }}">Home</a></li>
                            <li class="wt-active">Terms &amp; Conditions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Inner Home End-->
    <!--Main Start-->
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <!--Two Columns Start-->
        <div class="wt-haslayout wt-main-section">
            <div class="container">
                <div class="row">
                    <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                        <div class="col-xs-12 col-sm-12">
                            <div class="wt-submitreportholder wt-bgwhite">
                                <div class="wt-titlebar">
                                    <h2>How To Submit Claim Report</h2>
                                </div>
                                <div class="wt-reportdescription">
                                    <div class="wt-description">
                                        <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud <a
                                                href="javascrip:void(0);"> exercitation ullamco laboris</a> nisi ut aliquip
                                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                            velit esse cillum dolore eu fugiat nulla pariatur.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Two Columns End-->
    </main>
    <!--Main End-->

@endsection
@section('script')
@endsection
