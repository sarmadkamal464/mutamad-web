@extends('site.layout')
@section('title', 'Open Project')
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

        .wt-pagination ul li a {
            width: inherit !important;
            font-weight: bold !important;
        }

        .wt-dashboardboxcontent {
            padding: 30px 0px;
        }

        .wt-managejobcontent {
            padding: 0 30px;
        }

        .wt-contenthead .wt-title h2 {
            margin: 0 0 10px;
            line-height: 15px;
        }

        .wt-rightarea {
            float: right;
        }

        .wt-userlisting-breadcrumb li span,
        .wt-userlisting-breadcrumb li a {
            color: #323232;
            line-height: 1.6;
        }

        @media (max-width: 1681px) {

            .wt-userlistingvtwo .wt-userlistingcontent .wt-rightarea .wt-btnarea,
            .wt-userlistingvtwo .wt-userlistingcontentvtwo .wt-rightarea .wt-btnarea {
                padding: 0 0 30px;
            }
        }

        @media (max-width: 767px) {

            .wt-dashboardboxcontent,
            .wt-collapseexp {
                padding: 30px 10px;
            }
        }

        @media (min-width: 1200px) {
            .col-xl-3 {

                flex: 0 0 20%;
                max-width: 20%;
            }
        }

        @media (min-width: 1500px) {
            .col-xl-3 {

                flex: 0 0 25%;
                max-width: 25%;
            }
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
                            <h2>Project with proposal</h2>
                        </div>
                        <div class="wt-dashboardboxcontent wt-jobdetailsholder">
                            <div class="wt-completejobholder">
                                <div class="wt-managejobcontent">
                                    @if (count($data) == 0)
                                        <div class="wt-userlistinghold wt-featured">
                                            <div class="wt-userlistingcontent">
                                                <div class="wt-contenthead">
                                                    <div class="wt-title">
                                                        No Project with proposal Found
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @foreach ($data as $item)
                                        <div class="wt-userlistinghold wt-featured wt-userlistingvtwo">

                                            <div class="wt-userlistingcontent wt-userlistingcontentvtwo">
                                                <div class="wt-contenthead">
                                                    <div class="wt-title">
                                                        <h2>{{ $item->title }}</h2>
                                                    </div>
                                                    <ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">
                                                        <li><span class="wt-dashboraddoller"><i
                                                                    class="fa fa-dollar-sign"></i>
                                                                &nbsp; Project Category:{{ $item->category->name }}</span>
                                                        </li>

                                                        <li><span class="wt-dashboradclock"><i class="far fa-clock"></i>
                                                                &nbsp; Duration: {{ $item->duration->title }}</span></li>
                                                        <li><a href="javascript:void(0);" class="wt-clicksavefolder"><i
                                                                    class="far fa-folder"></i> &nbsp; Budget:
                                                                {{ $item->budget }}</a></li>
                                                    </ul>
                                                </div>
                                                <div class="wt-rightarea">
                                                    <div class="wt-btnarea">
                                                        <a href="{{ url('/project/' . $item->id) }}" class="wt-btn">VIEW
                                                            DETAILS</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- <nav class="wt-pagination wt-savepagination">
                            <ul>
                                <li class="wt-prevpage"><a href="javascrip:void(0);"><i
                                            class="lnr lnr-chevron-left"></i>Prev &nbsp;&nbsp;</a></li>

                                <li class="wt-nextpage"><a href="javascrip:void(0);">&nbsp;&nbsp;Next &nbsp;<i
                                            class="lnr lnr-chevron-right"></i></a></li>
                            </ul>
                        </nav> --}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <aside id="wt-sidebar" class="wt-sidebar wt-dashboardsave">
                        <a href="{{ url('get-project-proposals') }}" class="wt-proposalsr">
                            <div class="wt-proposalsrcontent">
                                <figure>
                                    <img src="{{ asset('images/thumbnail/img-17.png') }}" alt="image">
                                </figure>
                                <div class="wt-title">
                                    <h3> &#8659;</h3>
                                    <span>Projects With Proposals</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{ url('/open-projects') }}" class="wt-proposalsr">
                            <div class="wt-proposalsrcontent">
                                <figure>
                                    <img src="{{ asset('images/thumbnail/img-17.png') }}" alt="image">
                                </figure>
                                <div class="wt-title">
                                    <h3>{{ $projectCounts['open'] }}</h3>
                                    <span>Open Projects</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{ url('/ongoing-projects') }}" class="wt-proposalsr">
                            <div class="wt-proposalsrcontent">
                                <figure>
                                    <img src="{{ asset('images/thumbnail/img-17.png') }}" alt="image">
                                </figure>
                                <div class="wt-title">
                                    <h3>{{ $projectCounts['ongoing'] }}</h3>
                                    <span>Ongoing Projects</span>
                                </div>
                            </div>
                        </a>

                        <a href="{{ url('/completed-projects') }}" class="wt-proposalsr">
                            <div class="wt-proposalsrcontent wt-componyfolow">
                                <figure>
                                    <img src="{{ asset('images/thumbnail/img-16.png') }}" alt="image">
                                </figure>
                                <div class="wt-title">
                                    <h3>{{ $projectCounts['completed'] }}</h3>
                                    <span>Completed Projects</span>
                                </div>
                            </div>
                        </a>

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
