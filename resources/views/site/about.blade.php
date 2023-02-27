@extends('site.layout')
@section('title', 'About us')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

@endsection
@section('content')
    <!--Inner Home Banner Start-->
    <div class="wt-haslayout wt-innerbannerholder">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                    <div class="wt-innerbannercontent">
                        <div class="wt-title">
                            <h2>About us</h2>
                        </div>
                        <ol class="wt-breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li class="wt-active">About us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Inner Home End-->
    <!--Main Start-->
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <div class="wt-haslayout wt-main-section">
            <!--Greetings & Welcome Start-->
            <section class="wt-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="wt-greeting-holder">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
                                        <div class="wt-greetingcontent">
                                            <div class="wt-sectionhead">
                                                <div class="wt-sectiontitle">
                                                    <h2>Greetings &amp; Welcome</h2>
                                                    <span>Start Today For a Great Future</span>
                                                </div>
                                                <div class="wt-description">
                                                    <p>Dotem eiusmod tempor incune utnaem labore etdolore maigna aliqua
                                                        eniina ilukita ylokem lokateise ination voluptate velite esse cillum
                                                        dolore eu fugnulla pariatur lokaim urianewce anim id est laborumed.
                                                    </p>
                                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa officia
                                                        deserunt mollit anim id est laborumed perspiciatis unde omnis
                                                        isteatus error aluptatem accusantium doloremque laudantium.</p>
                                                </div>
                                            </div>
                                            <div id="wt-statistics" class="wt-statistics">
                                                <div class="wt-statisticcontent wt-countercolor1">
                                                    <h3 data-from="0" data-to="1500" data-speed="8000"
                                                        data-refresh-interval="50">1500</h3>
                                                    <em>k</em>
                                                    <h4>Active Projects</h4>
                                                </div>
                                                <div class="wt-statisticcontent wt-countercolor2">
                                                    <h3 data-from="0" data-to="99" data-speed="8000"
                                                        data-refresh-interval="5.9">99%</h3>
                                                    <em>%</em>
                                                    <h4>Great Feedback</h4>
                                                </div>
                                                <div class="wt-statisticcontent wt-countercolor3">
                                                    <h3 data-from="0" data-to="5000" data-speed="8000"
                                                        data-refresh-interval="100">5000</h3>
                                                    <em>k</em>
                                                    <h4>Active Freelancers</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Greetings & Welcome End-->
            <!--Signup Start-->

            <!--Signup End-->
            <!--Brand Start-->
            <div class="wt-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="wt-brandslider" class="wt-barandslider wt-haslayout owl-carousel">
                                <figure class="item wt-brandimg">
                                    <img src="{{ asset('images/brands/img-01.png') }}"alt="image description">
                                </figure>
                                <figure class="item wt-brandimg">
                                    <img src="{{ asset('images/brands/img-02.png') }}"alt="image description">
                                </figure>
                                <figure class="item wt-brandimg">
                                    <img src="{{ asset('images/brands/img-03.png') }}"alt="image description">
                                </figure>
                                <figure class="item wt-brandimg">
                                    <img src="{{ asset('images/brands/img-04.png') }}"alt="image description">
                                </figure>
                                <figure class="item wt-brandimg">
                                    <img src="{{ asset('images/brands/img-05.png') }}"alt="image description">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Brand End-->
            <!--Our Team Start-->
            <section class="wt-haslayout">
                <div class="container">
                    <div class="row">
                        {{-- content here --}}
                    </div>
                </div>
            </section>
            <!--Our Team End-->
        </div>
    </main>
    <!--Main End-->
@endsection
@section('script')
    <script src="{{ asset('js/jquery.hoverdir.js') }}"></script>
@endsection
