@extends('site.layout')
@section('title', 'Freelancer Details')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <style>
        .wt-titlewithselect .form-group {

            min-width: 135px;
        }

        .wt-userdetails .wt-description {
            position: initial;
        }
    </style>
@endsection
@section('content')

    <!--Inner Home Banner Start-->
    <div class="wt-haslayout wt-innerbannerholder wt-innerbannerholdervtwo">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                </div>
            </div>
        </div>
    </div>
    <!--Inner Home End-->
    <!--Main Start-->
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <!-- User Profile Start-->
        <div class="wt-main-section wt-paddingtopnull wt-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 float-left">
                        <div class="wt-userprofileholder">
                            <span class="wt-featuredtag"><img src="{{ asset('images/featured.png') }}" alt="img description"
                                    data-tipso="Plus Member" class="template-content tipso_style"></span>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-3 float-left">
                                <div class="row">
                                    <div class="wt-userprofile">
                                        <figure>
                                            <img src="{{ asset('images/user/userlisting/img-01.jpg') }}"
                                                alt="image description">
                                            <div class="wt-userdropdown wt-online">
                                            </div>
                                        </figure>
                                        <div class="wt-title">
                                            <h3><i class="fa fa-check-circle"></i> {{ $freelancer->name }}</h3>
                                            <span>5.0/5 <a class="javascript:void(0);">(860 Feedback)</a> <br>Member since
                                                May 30, 2013 <br><a href="javascript:void(0);">{{ $freelancer->email }}</a>
                                                <a href="javascript:void(0);" class="wt-reportuser">Report User</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-9 float-left">
                                <div class="row">
                                    <div class="wt-proposalhead wt-userdetails">
                                        <h2>{{ $freelancer->experience }}</h2>
                                        <ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">
                                            <li><span><i class="far fa-money-bill-alt"></i> {{ $freelancer->earning }} /
                                                    hr</span></li>
                                            <li><span>{{ $freelancer->country }}</span></li>

                                        </ul>
                                        <div class="wt-description">

                                            <p>{{ $freelancer->bio }}</p>


                                        </div>
                                    </div>
                                    <div id="wt-statistics" class="wt-statistics wt-profilecounter">

                                        <div class="wt-description">
                                            <p>* Adpsicing elit sed do eiusmod tempor incididunt ut labore et dolore.</p>
                                            <a href="javascript:void(0);" class="wt-btn" data-toggle="modal"
                                                data-target="#reviewermodal">Send Offer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Profile End-->
            <!-- User Listing Start-->
            <div class="container">
                <div class="row">
                    <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                            <div class="wt-usersingle">
                                <div class="wt-clientfeedback">
                                    <div class="wt-usertitle wt-titlewithselect">
                                        <h2>Client Feedback</h2>
                                        <div class="form-group">
                                            <span class="wt-select">
                                                <select>
                                                    <option value="Show All">Show All</option>
                                                    <option value="One Page">One Page </option>
                                                    <option value="Two Page">Two Page</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="wt-userlistinghold wt-userlistingsingle wt-bgcolor">

                                        <div class="wt-userlistingcontent">
                                            <div class="wt-contenthead">
                                                <div class="wt-title">
                                                    <a href="javascript:void(0);"><i class="fa fa-check-circle"></i>
                                                        Themeforest Company</a>
                                                    <h3>Translation and Proof Reading (Multi Language)</h3>
                                                </div>
                                                <ul class="wt-userlisting-breadcrumb">
                                                    <li><span><i class="fa fa-dollar-sign"></i> Beginner</span></li>
                                                    <li><span><img src="{{ asset('images/user/userlisting/img-01.jpg') }}"
                                                                alt="image description">
                                                            England</span></li>
                                                    <li><span><i class="fas fa-spinner fa-spin"></i> In Progress</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wt-btnarea">
                                        <a href="javascript:void(0);" class="wt-btn">Load More</a>
                                    </div>
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
    <!-- Popup Start-->
    <div class="modal fade wt-offerpopup" tabindex="-1" role="dialog" id="reviewermodal">
        <div class="modal-dialog" role="document">
            <div class="wt-modalcontent modal-content">
                <div class="wt-popuptitle">
                    <h2>Send a Project Offer</h2>
                    <a href="javascript%3bvoid(0)%3b.html" class="wt-closebtn close"><i class="fa fa-close"
                            data-dismiss="modal" aria-label="Close"></i></a>
                </div>
                <div class="modal-body">
                    <div class="wt-projectdropdown-hold">
                        <div class="wt-projectdropdown">
                            <div class="wt-projectselect">
                                <figure><img src="{{ asset('images/thumbnail/img-07.jpg') }}" alt="img description">
                                </figure>
                                <div class="wt-projectselect-content">
                                    <h3>Project Title Here</h3>
                                    <span><i class="lnr lnr-calendar-full"></i> Project Deadline: May 27, 2019</span>
                                </div>
                            </div>
                        </div>
                        <div class="wt-projectdropdown-option">
                            <div class="wt-projectselect">
                                <figure><img src="{{ asset('images/thumbnail/img-07.jpg') }}" alt="img description">
                                </figure>
                                <div class="wt-projectselect-content">
                                    <h3>Project Title Here</h3>
                                    <span><i class="lnr lnr-calendar-full"></i> Project Deadline: May 27, 2019</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="wt-formtheme wt-formpopup">
                        <fieldset>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Add Description*"></textarea>
                            </div>
                            <div class="form-group wt-btnarea">
                                <a href="javascript:void(0);" class="wt-btn">Send offer</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Popup End-->

@endsection
@section('script')
    <script src="{{ asset('js/jquery.hoverdir.js') }}"></script>
    <script>
        const formGroup = document.querySelector('.wt-titlewithselect .form-group');

        function handleWindowResize() {
            if (formGroup.offsetTop > formGroup.previousElementSibling.offsetTop) {
                formGroup.style.float = 'left ';
            } else {
                formGroup.style.float = 'right ';
            }
        }

        window.addEventListener('resize', handleWindowResize);
    </script>
@endsection
