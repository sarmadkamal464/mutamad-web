@extends('site.layout')
@section('title', 'Ongoing Project')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <style>
        .wrap {
            display: flex;
            flex-wrap: wrap;
        }

        .table-cell {
            display: table-cell !important;
        }

        .wt-main {
            padding: 121px 40px 20px 310px;
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
                            <h2>Invited Project by Client</h2>
                        </div>
                        <div class="wt-dashboardboxcontent wt-jobdetailsholder">
                            <div class="wt-completejobholder">
                                <div class="wt-managejobcontent">
                                    @if (count($data) == 0)
                                        <div class="wt-userlistinghold wt-featured">
                                            <div class="wt-userlistingcontent">
                                                <div class="wt-contenthead">
                                                    <div class="wt-title">
                                                        No Invited Project Found
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
                                                        <h2>{{ $item->project->title }}</h2>
                                                    </div>
                                                    <ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb  wrap">
                                                        <li style=" display: flex;"><span
                                                                class="wt-dashboradclock table-cell"><i
                                                                    class="far fa-clock"></i></span>
                                                            <span class="wt-dashboradclock">
                                                                &nbsp; Duration:
                                                                &nbsp;{{ $item->project->duration->title }}</span>
                                                        </li>
                                                        <li style=" display: flex;"><span
                                                                class="wt-clicksavefolder table-cell"><i
                                                                    class="far fa-folder"></i></span> <span
                                                                class="wt-clicksavefolder">&nbsp; Budget: &nbsp;
                                                                {{ $item->project->budget }}</span></li>
                                                    </ul>
                                                </div>
                                                <div class="wt-rightarea">
                                                    @if (count($data) > 0)
                                                        <form action="{{ url('fe-assign-freelancer-to-project') }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="project_id"
                                                                value="{{ $item->project->id }}">

                                                            <input type="hidden" name="proposal_id"
                                                                value="{{ $item->id }}">
                                                            <div class="wt-btnarea">
                                                                {{-- <button class="wt-btn" type="submit">Accept
                                                                    Project</button> --}}
                                                            </div>
                                                        </form>
                                                    @endif

                                                </div>

                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>


                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <aside id="wt-sidebar" class="wt-sidebar wt-dashboardsave">
                        <a href="{{ url('/invitation-projects') }}" class="wt-proposalsr">
                            <div class="wt-proposalsrcontent">
                                <figure>
                                    <img src="{{ asset('images/thumbnail/img-17.png') }}" alt="image">
                                </figure>
                                <div class="wt-title">
                                    <h3> &#8659;</h3>
                                    <span>Invited by Client</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{ url('/pending-projects') }}" class="wt-proposalsr">
                            <div class="wt-proposalsrcontent">
                                <figure>
                                    <img src="{{ asset('images/thumbnail/img-17.png') }}" alt="image">
                                </figure>
                                <div class="wt-title">
                                    <h3>{{ $projectCounts['requested'] }}</h3>
                                    <span>Requested to Client</span>
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
    <script>
        // let limit = 4;
        // const urlParams = new URLSearchParams(window.location.search);
        // let freelancerCount = {{ count($data) }}
        // let offset = parseInt(urlParams.get('offset')) || 0;
        // $('#prev').click(function(e) {
        //     e.preventDefault();
        //     if (offset > 0) {
        //         offset -= limit;
        //         window.location.href = `pending-projects?limit=${limit}&offset=${offset}`;
        //     }
        // });

        // $('#next').click(function(e) {
        //     e.preventDefault();
        //     if (freelancerCount <= 3) {
        //         return;
        //     }
        //     freelancerCount -= 4;
        //     offset += limit;
        //     window.location.href = `pending-projects?limit=${limit}&offset=${offset}`;

        // });
    </script>

@endsection
