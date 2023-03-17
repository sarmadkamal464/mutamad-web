@extends('site.layout')
@section('title', 'Assigned Project')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <style>
        .wt-main {
            padding: 121px 40px 20px 310px;
        }
    </style>
@endsection
@section('content')
    <!--Main Start-->
    <main id="wt-main" class="wt-main wt-haslayout">
        <!--Register Form Start-->
        <section class="wt-haslayout wt-dbsectionspace">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle">
                            <h2>Assigned Project</h2>
                        </div>
                        <div class="wt-dashboardboxcontent wt-jobdetailsholder">
                            <div class="wt-completejobholder">
                                <div class="wt-tabscontenttitle">
                                    <h2>Projects</h2>
                                </div>
                                <div class="wt-managejobcontent">
                                    <div class="wt-userlistinghold wt-featured wt-userlistingvtwo">
                                        <span class="wt-featuredtag"><img src="{{ asset('images/featured.png') }}"
                                                alt="img description" data-tipso="Plus Member"
                                                class="template-content tipso_style"></span>
                                        <div class="wt-userlistingcontent wt-userlistingcontentvtwo">
                                            <div class="wt-contenthead">
                                                <div class="wt-title">
                                                    <a href="usersingle.html"><i class="fa fa-check-circle"></i> Louanne
                                                        Mattioli
                                                    </a>
                                                    <h2>I want some customization and installation on wordpress</h2>
                                                </div>
                                                <ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">
                                                    <li><span class="wt-dashboraddoller"><i class="fa fa-dollar-sign"></i>
                                                            Professional</span></li>
                                                    <li><span><img src="{{ asset('images/flag/img-04.png') }}"
                                                                alt="img description">
                                                            England</span></li>
                                                    <li><a href="javascript:void(0);" class="wt-clicksavefolder"><i
                                                                class="far fa-folder"></i> Type: Per Fixed</a></li>
                                                    <li><span class="wt-dashboradclock"><i class="far fa-clock"></i>
                                                            Duration: 15 Days</span></li>
                                                </ul>
                                            </div>
                                            <div class="wt-rightarea">
                                                <div class="wt-btnarea">
                                                    <span> Project </span>
                                                    <a href="javascript:void(0);" class="wt-btn">Hire Now</a>
                                                </div>
                                                <div class="wt-hireduserstatus">
                                                    <h4>Fixed price project</h4><span>$120</span>
                                                    <ul class="wt-hireduserimgs">
                                                        <li>
                                                            <figure><img
                                                                    src="{{ asset('images/user/userlisting/img-01.jpg') }}"
                                                                    alt="img description"></figure>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <nav class="wt-pagination wt-savepagination">
                            <ul>
                                <li class="wt-prevpage"><a href="javascrip:void(0);"><i
                                            class="lnr lnr-chevron-left"></i></a></li>
                                <li><a href="javascrip:void(0);">1</a></li>
                                <li><a href="javascrip:void(0);">2</a></li>
                                <li><a href="javascrip:void(0);">3</a></li>
                                <li><a href="javascrip:void(0);">4</a></li>
                                <li><a href="javascrip:void(0);">...</a></li>
                                <li><a href="javascrip:void(0);">50</a></li>
                                <li class="wt-nextpage"><a href="javascrip:void(0);"><i
                                            class="lnr lnr-chevron-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-3">
                    <aside id="wt-sidebar" class="wt-sidebar wt-dashboardsave">
                        <div class="wt-proposalsr">
                            <div class="wt-proposalsrcontent">
                                <figure>
                                    <img src="{{ asset('images/thumbnail/img-17.png') }}" alt="image">
                                </figure>
                                <div class="wt-title">
                                    <h3>150</h3>
                                    <span>Total Ongoing Jobs</span>
                                </div>
                            </div>
                        </div>
                        <div class="wt-proposalsr">
                            <div class="wt-proposalsrcontent wt-componyfolow">
                                <figure>
                                    <img src="{{ asset('images/thumbnail/img-16.png') }}" alt="image">
                                </figure>
                                <div class="wt-title">
                                    <h3>1406</h3>
                                    <span>Total Completed Jobs</span>
                                </div>
                            </div>
                        </div>

                    </aside>

                </div>
            </div>
        </section>
        <!--Register Form End-->
    </main>
    <!--Main End-->
@endsection
@section('script')
@endsection
