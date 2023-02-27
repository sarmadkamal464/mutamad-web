@extends('site.layout')
@section('title', 'Mutamad')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
@endsection

@section('content')
    <!--Home Banner Start-->
    <div class="wt-haslayout wt-bannerholder">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                    <div class="wt-bannerimages">
                        <figure class="wt-bannermanimg" data-tilt>
                            <img src="{{ asset('images/bannerimg/img-01.png') }}" alt="img description">
                            <img src="{{ asset('images/bannerimg/img-02.png') }}" class="wt-bannermanimgone"
                                alt="img description">
                            <img src="{{ asset('images/bannerimg/img-03.png') }}" class="wt-bannermanimgtwo"
                                alt="img description">
                        </figure>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                    <div class="wt-bannercontent">
                        <div class="wt-bannerhead">
                            <div class="wt-title">
                                <h1><span>Hire expert freelancers</span> for any job, Online</h1>
                            </div>
                            <div class="wt-description">
                                <p>Consectetur adipisicing elit sed dotem eiusmod tempor incuntes ut labore etdolore maigna
                                    aliqua enim.</p>
                            </div>
                        </div>
                        <form class="wt-formtheme wt-formbanner">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="fullname" class="form-control"
                                        placeholder="I’m looking for">
                                    <div class="wt-formoptions">
                                        <div class="wt-dropdown">
                                            <span>In: <em class="selected-search-type">Freelancers </em><i
                                                    class="lnr lnr-chevron-down"></i></span>
                                        </div>
                                        <div class="wt-radioholder">
                                            <span class="wt-radio">
                                                <input id="wt-freelancers" data-title="Freelancers" type="radio"
                                                    name="searchtype" value="freelancer" checked>
                                                <label for="wt-freelancers">Freelancers</label>
                                            </span>
                                            <span class="wt-radio">
                                                <input id="wt-jobs" data-title="Jobs" type="radio" name="searchtype"
                                                    value="job">
                                                <label for="wt-jobs">Projects</label>
                                            </span>
                                        </div>
                                        <a class="wt-searchbtn"><i class="lnr lnr-magnifier"></i></a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Home Banner End-->

    <!--Main Start-->
    <main id="wt-main" class="wt-main wt-haslayout">
        <!--Categories Start-->
        <section class="wt-haslayout wt-main-section">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                        <div class="wt-sectionhead wt-textcenter">
                            <div class="wt-sectiontitle">
                                <h2>Explore Categories</h2>
                                <span>Professional by categories</span>
                            </div>
                        </div>
                    </div>
                    <div class="wt-categoryexpl">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 float-left">
                            <div class="wt-categorycontent">
                                <figure><img src="{{ asset('images/categories/img-01.png') }}" alt="image description">
                                </figure>
                                <div class="wt-cattitle">
                                    <h3><a href="javascrip:void(0);">Mobiles</a></h3>
                                </div>
                                <div class="wt-categoryslidup">
                                    <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.
                                    </p>
                                    <a href="javascript:void(0);">Explore <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 float-left">
                            <div class="wt-categorycontent">
                                <figure><img src="{{ asset('images/categories/img-08.png') }}" alt="image description">
                                </figure>
                                <div class="wt-cattitle">
                                    <h3><a href="javascrip:void(0);">Digital Marketing</a></h3>
                                </div>
                                <div class="wt-categoryslidup">
                                    <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.
                                    </p>
                                    <a href="javascript:void(0);">Explore <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 float-left">
                            <div class="wt-categorycontent">
                                <figure><img src="{{ asset('images/categories/img-02.png') }}" alt="image description">
                                </figure>
                                <div class="wt-cattitle">
                                    <h3><a href="javascrip:void(0);">Writing &amp; Translation</a></h3>
                                </div>
                                <div class="wt-categoryslidup">
                                    <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.
                                    </p>
                                    <a href="javascript:void(0);">Explore <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 float-left">
                            <div class="wt-categorycontent">
                                <figure><img src="{{ asset('images/categories/img-03.png') }}" alt="image description">
                                </figure>
                                <div class="wt-cattitle">
                                    <h3><a href="javascrip:void(0);">Video &amp; Animation</a></h3>
                                </div>
                                <div class="wt-categoryslidup">
                                    <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.
                                    </p>
                                    <a href="javascript:void(0);">Explore <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 float-left">
                            <div class="wt-categorycontent">
                                <figure><img src="{{ asset('images/categories/img-04.png') }}" alt="image description">
                                </figure>
                                <div class="wt-cattitle">
                                    <h3><a href="javascrip:void(0);">Music &amp; Audio</a></h3>
                                </div>
                                <div class="wt-categoryslidup">
                                    <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.
                                    </p>
                                    <a href="javascript:void(0);">Explore <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 float-left">
                            <div class="wt-categorycontent">
                                <figure><img src="{{ asset('images/categories/img-05.png') }}" alt="image description">
                                </figure>
                                <div class="wt-cattitle">
                                    <h3><a href="javascrip:void(0);">Programming &amp; Tech</a></h3>
                                </div>
                                <div class="wt-categoryslidup">
                                    <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.
                                    </p>
                                    <a href="javascript:void(0);">Explore <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 float-left">
                            <div class="wt-categorycontent">
                                <figure><img src="{{ asset('images/categories/img-06.png') }}" alt="image description">
                                </figure>
                                <div class="wt-cattitle">
                                    <h3><a href="javascrip:void(0);">Business</a></h3>
                                </div>
                                <div class="wt-categoryslidup">
                                    <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.
                                    </p>
                                    <a href="javascript:void(0);">Explore <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 float-left">
                            <div class="wt-categorycontent">
                                <figure><img src="{{ asset('images/categories/img-07.png') }}" alt="image description">
                                </figure>
                                <div class="wt-cattitle">
                                    <h3><a href="javascrip:void(0);">Fun &amp; Lifestyle</a></h3>
                                </div>
                                <div class="wt-categoryslidup">
                                    <p>Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.
                                    </p>
                                    <a href="javascript:void(0);">Explore <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                            <div class="wt-btnarea">
                                <a href="javascript:void(0)" class="wt-btn">View All</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
        <!--Categories End-->
        <!--Join Company Info Start-->
        <section class="wt-haslayout wt-main-section wt-paddingnull wt-companyinfohold">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="wt-companydetails">
                            <div class="wt-companycontent">
                                <div class="wt-companyinfotitle">
                                    <h2>Start As Client</h2>
                                </div>
                                <div class="wt-description">
                                    <p>Consectetur adipisicing elit sed dotem eiusmod tempor incune utnaem labore etdolore
                                        maigna aliqua enim poskina ilukita ylokem lokateise ination voluptate velit esse
                                        cillum.</p>
                                </div>
                                <div class="wt-btnarea">
                                    <a href="javascript:void(0);" class="wt-btn">Join Now</a>
                                </div>
                            </div>
                            <div class="wt-companycontent">
                                <div class="wt-companyinfotitle">
                                    <h2>Start As Freelancer</h2>
                                </div>
                                <div class="wt-description">
                                    <p>Consectetur adipisicing elit sed dotem eiusmod tempor incune utnaem labore etdolore
                                        maigna aliqua enim poskina ilukita ylokem lokateise ination voluptate velit esse
                                        cillum.</p>
                                </div>
                                <div class="wt-btnarea">
                                    <a href="javascript:void(0);" class="wt-btn">Join Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Join Company Info End-->
        <!--Limitless Experience Start-->
        <section class="wt-haslayout wt-main-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 float-left">
                        <figure class="wt-mobileimg">
                            <img src="{{ asset('images/app.png') }}" alt="img description">
                        </figure>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 float-left">
                        <div class="wt-experienceholder">
                            <div class="wt-sectionhead">
                                <div class="wt-sectiontitle">
                                    <h2>Limitless Experience</h2>
                                    <span>Roam Around With Your Business</span>
                                </div>
                                <div class="wt-description">
                                    <p>Dotem eiusmod tempor incune utnaem labore etdolore maigna aliqua enim poskina ilukita
                                        ylokem lokateise ination voluptate velit esse cillum dolore eu fugiat nulla pariatur
                                        lokaim urianewce.</p>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                        mollit anim id est laborumed perspiciatis.</p>
                                </div>
                                <ul class="wt-appicon">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <figure><img src="{{ asset('images/app-icon/img-01.png') }}"
                                                    alt="img description"></figure>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <figure><img src="{{ asset('images/app-icon/img-02.png') }}"
                                                    alt="img description"></figure>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Limitless Experience End-->
    </main>
    <!--Main End-->
@endsection
@section('script')
@endsection
