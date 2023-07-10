@extends('site.layout')
@section('title', 'Freelancer Details')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <style>
        .wt-userdetails {
            min-width: 100%;

        }

        .wt-userdetails .wt-description {
            width: 100%;
        }

        .wt-profilecounter {
            align-items: center;
            width: 100%;
            display: flex;
        }

        .wt-titlewithselect .form-group {

            min-width: 135px;
        }

        .wt-userdetails .wt-description {
            position: initial;
        }

        .wt-btn {
            margin: 5px;

        }

        .wt-profilecounter {

            max-width: 570px;

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

                            <div class="col-12 col-sm-12 col-md-12 col-lg-3 float-left">
                                <div class="row">
                                    <div class="wt-userprofile">
                                        <figure>
                                            @if ($freelancer->profile_image != null)
                                                <img src="{{ url(config('app.storage_url') . 'user-profile-pictures/' . $freelancer->profile_image) }}"
                                                    class="profile-image-avatar" />
                                            @else
                                                <img src="{{ asset('images/user-avatar.png') }}"
                                                    class="profile-image-avatar" />
                                            @endif
                                        </figure>
                                        <div class="wt-title">
                                            <h3><i class="fa fa-check-circle"></i> {{ $freelancer->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-9 float-left">
                                <div class="row">
                                    <div class="wt-proposalhead wt-userdetails">
                                        <h2>{{ $freelancer->experience }}</h2>
                                        <ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo">
                                            <li><span><i class="far fa-money-bill-alt"></i> {{ $freelancer->earning }}
                                                </span></li>
                                            <li><span><b>Country:</b> {{ $freelancer->country->name }}</span></li>

                                        </ul>
                                        <div class="wt-description">

                                            <p>{{ $freelancer->bio }}</p>

                                        </div>
                                    </div>
                                    <div id="wt-statistics" class="wt-statistics wt-profilecounter">
                                        <div class="wt-description">
                                            <a href="javascript:void(0);" class="wt-btn" data-toggle="modal"
                                                data-target="#reviewermodal" onclick="getOpenProjects()">Send Offer</a>
                                            <a href="{{ url('/messages/' . $freelancer->id) }}" class="wt-btn">Start
                                                Chat

                                            </a>
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
                    <a href="javascript%3bvoid(0)%3b.html" class="wt-closebtn close"><i
                            style="
                        color: black;" class="fa fa-close" data-dismiss="modal"
                            aria-label="Close"></i></a>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/invite-freelancer-to-project') }}" method="POST"
                        class="wt-formtheme wt-formpopup">
                        @csrf
                        <input type="hidden" name="freelancer_id" value="{{ $freelancer->id }}">
                        <fieldset>
                            <div class="form-group ">
                                <select style="width: 100%;margin-bottom:2%" name="project_id" class="openProjectDropdown"
                                    required>
                                    <option disabled selected value="">Select Project</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Add Description*" required></textarea>
                            </div>
                            <div class="form-group wt-btnarea">
                                <button type="submit" class="wt-btn color-white">Send offer</button>
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
        $(document).ready(function() {
            console.log('here');



        });

        function getOpenProjects() {
            $.ajax({
                type: "GET",
                url: "{{ url('open-projects') }}",
                data: {
                    'ajax': true
                },
                success: function(response) {
                    $('.openProjectDropdown').html();
                    var html = '';
                    $.each(response['data'], function(id, data) {
                        html += `<option value="${data['id']}">${data['title']}</option>`;
                    });
                    $('.openProjectDropdown').html(html);
                }
            });
        }


        // const formGroup = document.querySelector('.wt-titlewithselect .form-group');

        // function handleWindowResize() {
        //     if (formGroup.offsetTop > formGroup.previousElementSibling.offsetTop) {
        //         formGroup.style.float = 'left ';
        //     } else {
        //         formGroup.style.float = 'right ';
        //     }
        // }

        // window.addEventListener('resize', handleWindowResize);
    </script>
@endsection
