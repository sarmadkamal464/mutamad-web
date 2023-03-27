@extends('site.layout')
@section('title', 'Freelancer')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <style>
        @media (max-width: 820px) {
            .wt-wrapper .wt-main {

                padding: 20px 5px !important;
            }
        }

        .wt-wrapper .wt-main {
            padding-left: 0px !important;
            padding: 80px 0px;
        }

        .padding {
            /* margin: auto;
                        padding: 80px 0px; */
            display: flex;
            justify-content: center;
            align-items: center
        }
    </style>
@endsection
@section('content')
    <!--Main Start-->
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <div class="wt-haslayout wt-main-section">
            <!-- User Listing Start-->
            <div class="container">
                <div class="row">
                    <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-left">
                            <div class="wt-proposalholder">
                                <span class="wt-featuredtag"><img src="images/featured.png" alt="img description"
                                        data-tipso="Plus Member" class="template-content tipso_style"></span>
                                <div class="wt-proposalhead">
                                    <h2>{{ $title }}</h2>
                                    <ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">
                                        <li><span><i class="fa fa-dollar-sign"></i><i class="fa fa-dollar-sign"></i><i
                                                    class="fa fa-dollar-sign"></i> Budget: {{ $budget }}</span></li>

                                        <li><span><i class="far fa-folder"></i> Project Status: {{ $status }}</span>
                                        </li>
                                        <li><span><i class="far fa-folder"></i> Project Category:
                                                {{ $category['name'] }}</span></li>
                                        <li><span><i class="far fa-clock"></i> Duration: {{ $duration['title'] }}</span>
                                        </li>
                                    </ul>
                                </div>
                                @if (Auth::user()->role == 'freelancer')
                                    <div class="wt-btnarea"><a href="javascrip:void(0);" class="wt-btn">Send Proposal</a>
                                    </div>
                                @else
                                    <div class="wt-btnarea"><a href="{{ url('get-project-proposals/' . $id) }}"
                                            class="wt-btn">Assign Project</a>&nbsp;<a
                                            href="{{ url('/invite-freelancer-to-project') }}" class="wt-btn">Invite
                                            Freelancer</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                            <div class="wt-projectdetail-holder">
                                <div class="wt-projectdetail">
                                    <div class="wt-title">
                                        <h3>Project Detail</h3>
                                    </div>
                                    <div class="wt-description">
                                        <p>{{ $description }}</p>
                                    </div>
                                </div>
                                <div class="wt-attachments">
                                    <div class="wt-title">
                                        <h3>Attachments</h3>
                                    </div>
                                    <ul class="wt-attachfile">
                                        @if ($document != null)
                                            <li>
                                                <span>Document</span>
                                                <em>File size: 512 kb<a
                                                        href="{{ url(config('app.storage_url') . 'document/' . $document) }}"><i
                                                            class="lnr lnr-download">{{ $document }}</i></a></em>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- User Listing End-->
        </div>
    </main>
    <!--Main End-->
@endsection
