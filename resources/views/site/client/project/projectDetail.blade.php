@extends('site.layout')
@section('title', 'Freelancer')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <style>
            .wt-hireduserimgs figure {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 50%;
}
.wt-hireduserimgs figure img {
   height: 100%;
    width: 100%;
    border-radius: 50%;
}
            .wt-hireduserimgs figure {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 50%;
}
.wt-hireduserimgs figure img {
   height: 100%;
    width: 100%;
    border-radius: 50%;
}
        .wrap {
            display: flex;
            flex-wrap: wrap;
        }

        .table-cell {
            display: table-cell !important;
        }


        .wt-hireduserimgs figure {
            width: 50px;
            height: 50px;
        }
        .wt-hireduserimgs figure img{
            width: 100%;
    height: 100%;
    object-fit: cover;
        }

        p {
            margin: 0 0 10px;
        }

        .wt-description {

            float: initial;

        }

        .wt-projectdetail .wt-description p {

            margin: 0 0 3px;
        }

        .wt-projectdetail-holder .wt-title h3 {
            font-weight: 600;
        }

        .bold {
            font-size: large;
            font-weight: 600;

        }

        .inline {
            display: inline-block !important;
        }

        .wt-proposalholder .wt-btnarea {
            margin-top: 0px;

        }

        .wt-hireduserstatus {
            padding: 0px;

        }

        .wt-hireduserimgs {
            padding: 10px 0;
        }





        .wt-proposalholder .wt-btnarea {
            margin-top: 0px;
            padding: 0px;
        }

        /* .wt-proposalholder {
                                                                                                                                                                                                                                display: flex;
                                                                                                                                                                                                                                flex-direction: column;
                                                                                                                                                                                                                            } */

        @media (max-width: 991px) {

            .wt-hireduserstatus,
            .wt-hireduserimgs {
                padding: 10px 0;
                display: flex;
                margin-left: 0px;
                align-items: start;
                flex-direction: column;
            }
        }

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

        .wt-attachfile li em i {
            width: 100%;
            font-size: 13px;
            color: #55acee;
            text-align: center;
            display: flex;
            flex-direction: row;
            vertical-align: middle;
            padding-bottom: 6px;
        }

        .wt-userlisting-breadcrumb li span,
        .wt-userlisting-breadcrumb li a {
            color: #323232;
            line-height: 1.6;
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
                                <div class="wt-proposalhead">
                                    <h2>{{ $data->title }}</h2>

                                    <ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb wrap">
                                        <li style=" display: flex;">
                                            <span class="wt-dashboraddoller table-cell"><i
                                                    class="fa fa-dollar-sign"></i></span><span class="wt-dashboraddoller">
                                                &nbsp; Budget: &nbsp; {{ $data->budget }}</span>
                                        </li>
                                        <li style=" display: flex;"><span class="wt-dashboradclock table-cell"><i
                                                    class="far fa-clock"></i></span>
                                            <span class="wt-dashboradclock">&nbsp; Duration: &nbsp;
                                                {{ $data->duration['title'] }}</span>
                                        </li>
                                        <li style=" display: flex;"><span class="wt-clicksavefolder table-cell"><i
                                                    class="far fa-folder"></i> </span><span
                                                class="wt-clicksavefolder">&nbsp; Category:
                                                &nbsp;
                                                {{ $data->category['name'] }}</span>
                                        </li>
                                    </ul>
                                </div>


                                @if (Auth::user()->role == 'freelancer')
                                    <div class="wt-btnarea">
                                        <div class="wt-hireduserstatus">
                                            <ul class="wt-hireduserimgs">

                                                @if (!is_null($data->clients->profile_image))
                                                    <li>
                                                        <figure><img
                                                                src="{{ url(config('app.storage_url') . 'user-profile-pictures/' . $data->clients->profile_image) }}"
                                                                class="mCS_img_loaded"></figure>
                                                    </li>
                                                @else
                                                    <li>
                                                        <figure><img src="{{ asset('images/user-avatar.png') }}"
                                                                class="mCS_img_loaded"></figure>
                                                    </li>
                                                @endif
                                            </ul>

                                            <p>{{ $data->clients->name }}</p>
                                            @if ($data->status == 'completed')
                                                <p><span class="bold inline">Status : </span><span class=" inline"
                                                        style="color: red;">
                                                        &nbsp; Project
                                                        Closed</span></p>
                                            @endif
                                            {{-- {{ $data->clients->name profile_image}} --}}
                                        </div>
                                    </div>
                                @endif
                                @if (Auth::user()->role == 'freelancer')


                                    @if (url()->current() == url('single-project2/' . $data->id))
                                        <div class="wt-btnarea color-white">
                                        </div>
                                    @else
                                        <form method="POST" action="{{ url('sendProposal') }}">
                                            @csrf
                                            <div class="wt-btnarea"><a type="submit" class="wt-btn"></a>
                                            </div>
                                            <div class="wt-jobdetails wt-tabsinfo">
                                                <div class="wt-tabscontenttitle">
                                                    <h2>Add Comment</h2>
                                                </div>

                                                <textarea name="description" class="form-group" style="height: 105px" placeholder="Add Special comment to employer"
                                                    required></textarea>
                                                <input type="hidden" name="project_id" value="{{ $data->id }}">
                                                <input type="hidden" name="_redirect"
                                                    value="{{ url('/search-project?limit=4') }}">
                                                <button type="submit" class="wt-btn">Send
                                                    Proposal</button>
                                        </form>
                            </div>
                            @endif
                        @else
                            @if ($data->status == 'open')
                                <div class="wt-btnarea"><a href="{{ url('get-project-proposals/' . $data->id) }}"
                                        class="wt-btn">Assign Project</a>
                                </div>
                            @elseif($data->status == 'ongoing')
                                <div class="wt-btnarea color-white"><a data-toggle="modal" data-target="#reviewermodal"
                                        class="wt-btn">Mark as done</a>
                                </div>

                                {{-- Modal for closing project --}}
                                <div class="modal fade wt-offerpopup" tabindex="-1" role="dialog" id="reviewermodal"
                                    style="padding-right: 17px;">
                                    <div class="modal-dialog" role="document">
                                        <div class="wt-modalcontent modal-content">
                                            <div class="wt-popuptitle">
                                                <h2>Close Project/End Contract</h2>
                                                <a class="wt-closebtn close"><i class="fa fa-close" data-dismiss="modal"
                                                        aria-label="Close"></i></a>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('mark-project-as-done') }}"
                                                    class="wt-formtheme wt-formpopup">

                                                    @csrf
                                                    <input type="hidden" name="project_id" value="{{ $data->id }}">
                                                    @if ($data->proposals == '[]')
                                                        <fieldset>
                                                            <p style="color: red;">Freelancer Deactivated</p>
                                                        </fieldset>
                                                    @else
                                                        @foreach ($data->proposals as $proposal)
                                                            @if ($proposal['proposal_type'] == 'proposal' && $proposal['status'] == 'ongoing')
                                                                <input type="hidden" name="proposal_id"
                                                                    value="{{ $proposal['id'] }}">
                                                                <div class="proposal">
                                                                    <p>{{ $proposal['description'] }}</p>
                                                                    <p>Amount: {{ $data->budget }}</p>
                                                                    <p>Status: {{ $proposal['status'] }}</p>
                                                                    <p>By Freelancer:
                                                                        {{ $proposal['freelancer']['name'] }}
                                                                    </p>
                                                                </div>
                                                                <fieldset>

                                                                    <div class="form-group">
                                                                        <label for="rating">Rating:</label>
                                                                        <select class="form-control" id="rating"
                                                                            name="rating" required>

                                                                            <option value="1.0">1.0</option>

                                                                            <option value="2.0">2.0</option>

                                                                            <option value="3.0">3.0</option>

                                                                            <option value="4.0">4.0</option>

                                                                            <option value="5.0">5.0</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="comment">Comment:</label>
                                                                        <textarea class="form-control" id="comment" name="comment" placeholder="Add Reviews*" required></textarea>
                                                                    </div>
                                                                    <div class="form-group wt-btnarea">
                                                                        <button type="submit"
                                                                            class="wt-btn color-white">Close
                                                                            Project </button>
                                                                    </div>
                                                                </fieldset>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="wt-btnarea">
                                    <div class="wt-hireduserstatus">
                                        <ul class="wt-hireduserimgs">
                                            @if ($data->proposals == '[]')

                                                <p style="color: red;">Freelancer Deactivated</p>
                                            @else
                                                @if (!is_null($data->proposals[0]['freelancer']['profile_image']))
                                                    <li>
                                                        <figure><img
                                                                src="{{ url(config('app.storage_url') . 'user-profile-pictures/' . $data->proposals[0]['freelancer']['profile_image']) }}"
                                                                class="mCS_img_loaded"></figure>
                                                    </li>
                                                @else
                                                    <li>
                                                        <figure><img src="{{ asset('images/user-avatar.png') }}"
                                                                class="mCS_img_loaded"></figure>
                                                    </li>
                                                @endif
                                        </ul>

                                        <p>{{ $data->proposals[0]['freelancer']['name'] }}</p>
                                        <p><span class="bold inline">Status : </span><span class=" inline"
                                                style="color: red;"> &nbsp; Project
                                                Closed</span></p>
                                        {{-- {{ $data->clients->name profile_image}} --}}
                                    </div>
                                </div>
                            @endif
                            @endif
                            @endif
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                        <div class="wt-projectdetail-holder">
                            <div class="wt-projectdetail">
                                @if ($review)
                                    <div class="wt-review">
                                        <div class="wt-title">
                                            <h3>Review </h3>
                                        </div>
                                        <div class="wt-description">

                                            <p style="font-size: 14px;"><span ><b> Rating :</b></span>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <i class="fa fa-star" style="color:rgb(241, 241, 54)"></i>
                                                    @else
                                                        <i class="fa fa-star-o" style="color:rgb(0 0 0 / 39%);"></i>
                                                    @endif
                                                @endfor
                                            </p>

                                            <p  style="font-size: 14px;"><span ><b> Comment : </b></span>{{ $review->comment }}</p>
                                        </div>
                                    </div>
                                @endif
                                <div class="wt-title">
                                    <h3>Project Detail</h3>
                                </div>

                                <div  class="wt-description">
                                    <p  style="font-size: 14px;">{{ $data->description }}</p>
                                </div>
                            </div>
                            <div class="wt-attachments">
                                <div class="wt-title">
                                    <h3>Attachments</h3>
                                </div>
                                <ul class="wt-attachfile">
                                    @if ($data->document != null)
                                        <li>
                                            <span>Document</span>
                                            <em>File size: 512 kb<a target="__blank"
                                                    href="{{ url(config('app.storage_url') . 'documents/' . $data->document) }}"><i
                                                        class="lnr lnr-download">{{ $data->document }}</i></a></em>
                                        </li>
                                    @else
                                        <li>
                                            <span style="
                                                color: grey;">No
                                                Attachment</span>
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
