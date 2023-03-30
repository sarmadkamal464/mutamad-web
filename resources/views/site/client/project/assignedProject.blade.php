@extends('site.layout')
@section('title', 'Assigned Project')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <style>
        .wt-msgbtn {
            padding: 0 26px;
            line-height: 36px;
            background: #0583ce;
        }

        .wt-dashboardbox {
            max-width: 1140px
        }

        .center {
            display: flex;
            justify-content: center
        }

        .wt-accordiontitle p {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        .wt-proposaldetails {
            width: 100%;
        }

        .wt-main {
            padding: 121px 40px 20px 40px;
        }
    </style>
@endsection
@section('content')
    <!--Main Start-->
    <main id="wt-main" class="wt-main wt-haslayout">
        <!--Register Form Start-->
        <section class="wt-haslayout wt-dbsectionspace">
            <div class="row">
                <div class="center col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle">
                            <h2>Assign Project</h2>
                        </div>
                        <div class="wt-dashboardboxcontent wt-rcvproposala">
                            <div class="wt-userlistinghold wt-featured wt-userlistingvtwo">
                                <div class="wt-userlistingcontent">
                                    <div class="wt-contenthead">
                                        <div class="wt-title">
                                            <h2>{{ $title }}</h2>
                                        </div>
                                        <ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">
                                            <li><span class="wt-dashboraddoller"><i class="fa fa-dollar-sign"></i>
                                                    Project
                                                    Category:{{ $category['name'] }}</span></li>

                                            <li><span class="wt-dashboradclock"><i class="far fa-clock"></i>
                                                    Duration: {{ $duration['title'] }}</span></li>
                                            <li><a href="javascript:void(0);" class="wt-clicksavefolder"><i
                                                        class="far fa-folder"></i> Budget:
                                                    {{ $budget }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="wt-rightarea">
                                        <div class="wt-hireduserstatus">
                                            <h4>{{ count($proposals) }}</h4><span>Proposals Received</span>
                                            <ul class="wt-hireduserimgs">
                                                @foreach ($proposals as $proposal)
                                                    @if (!is_null($proposal['freelancer']['profile_image']))
                                                        <li>
                                                            <figure><img
                                                                    src="{{ url(config('app.storage_url') . 'user-profile-pictures/' . $proposal['freelancer']['profile_image']) }}"
                                                                    class="mCS_img_loaded"></figure>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <figure><img src="{{ asset('images/user-avatar.png') }}"
                                                                    class="mCS_img_loaded"></figure>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wt-freelancerholder wt-rcvproposalholder">
                                <div class="wt-tabscontenttitle">
                                    <h2>Received Proposals</h2>
                                </div>

                                <div class="wt-managejobcontent">
                                    @foreach ($proposals as $proposal)
                                        <div class="wt-userlistinghold wt-featured wt-proposalitem">
                                            <figure class="wt-userlistingimg">
                                                @if (!is_null($proposal['freelancer']['profile_image']))
                                                    <img src="{{ url(config('app.storage_url') . 'user-profile-pictures/' . $proposal['freelancer']['profile_image']) }}"
                                                        alt="{{ $proposal['freelancer']['name'] }}" class="mCS_img_loaded">
                                                @else
                                                    <img src="{{ asset('images/user-avatar.png') }}"
                                                        alt="{{ $proposal['freelancer']['name'] }}" class="mCS_img_loaded">
                                                @endif
                                            </figure>
                                            <div class="wt-proposaldetails">
                                                <div class="wt-contenthead">
                                                    <div class="wt-title">
                                                        <a
                                                            href="{{ url('freelancer') . '/' . $proposal['freelancer']['username'] }}">{{ $proposal['freelancer']['name'] }}</a>
                                                    </div>
                                                </div>
                                                {{-- <div class="wt-proposalfeedback">
                                                    <p class="wt-starcontent">
                                                        Earnings:&nbsp;<i>{{ $proposal['freelancer']['earning'] }}</i></p>
                                                </div> --}}
                                                <div class="wt-accordiontitle collapsed" data-toggle="collapse"
                                                    data-target="#proposal{{ $proposal['id'] }}" aria-expanded="false">
                                                    <span>
                                                        {{-- <p>{{ $proposal['description'] }}</p> --}}
                                                    </span>
                                                    <span style="font-size: 14px;">Cover Letter </span><i
                                                        class="lnr lnr-chevron-down"></i></a>
                                                </div>
                                                <div class="wt-accordiondetails collapse"
                                                    id="proposal{{ $proposal['id'] }}">
                                                    <div class="wt-title">

                                                    </div>
                                                    <div class="wt-description">
                                                        <p>{{ $proposal['description'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wt-rightarea">
                                                <div class="wt-btnarea">
                                                    <form action="{{ url('assign-freelancer-to-project') }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="project_id"
                                                            value="{{ $proposal['project_id'] }}">
                                                        <input type="hidden" name="proposal_id"
                                                            value="{{ $proposal['id'] }}">
                                                        <button type="submit" class="wt-btn color-white ">Hire Now</button>
                                                    </form>
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
                        </nav> --}}
                    </div>
                </div>

            </div>
        </section>
        <!--Register Form End-->
    </main>
    <!--Main End-->
@endsection
@section('script')
@endsection
