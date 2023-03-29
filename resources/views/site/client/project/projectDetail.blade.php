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
                                    @if ($status == 'open')
                                        <div class="wt-btnarea"><a href="{{ url('get-project-proposals/' . $id) }}"
                                                class="wt-btn">Assign Project</a>
                                        </div>
                                    @elseif($status == 'ongoing')
                                        <div class="wt-btnarea color-white"><a data-toggle="modal"
                                                data-target="#reviewermodal" class="wt-btn">Mark as done</a>
                                        </div>
                                        <div class="wt-hireduserstatus">
                                            <ul class="wt-hireduserimgs">
                                                @if (!is_null($proposals[0]['freelancer']['profile_image']))
                                                    <li>
                                                        <figure><img
                                                                src="{{ url(config('app.storage_url') . 'user-profile-pictures/' . $proposals[0]['freelancer']['profile_image']) }}"
                                                                class="mCS_img_loaded"></figure>
                                                    </li>
                                                @else
                                                    <li>
                                                        <figure><img src="{{ asset('images/user-avatar.png') }}"
                                                                class="mCS_img_loaded"></figure>
                                                    </li>
                                                @endif
                                            </ul>
                                            <p>{{ $proposals[0]['freelancer']['name'] }}</p>
                                        </div>
                                        {{-- Modal for closing project --}}
                                        <div class="modal fade wt-offerpopup" tabindex="-1" role="dialog"
                                            id="reviewermodal" style="padding-right: 17px;">
                                            <div class="modal-dialog" role="document">
                                                <div class="wt-modalcontent modal-content">
                                                    <div class="wt-popuptitle">
                                                        <h2>Close Project/End Contract</h2>
                                                        <a class="wt-closebtn close"><i class="fa fa-close"
                                                                data-dismiss="modal" aria-label="Close"></i></a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ url('mark-project-as-done') }}"
                                                            class="wt-formtheme wt-formpopup">
                                                            @csrf
                                                            <input type="hidden" name="project_id"
                                                                value="{{ $id }}">
                                                            @foreach ($proposals as $proposal)
                                                                @if ($proposal['proposal_type'] == 'proposal' && $proposal['status'] == 'ongoing')
                                                                    <input type="hidden" name="proposal_id"
                                                                        value="{{ $proposal['id'] }}">
                                                                    <div class="proposal">
                                                                        <p>{{ $proposal['description'] }}</p>
                                                                        <p>Amount: {{ $budget }}</p>
                                                                        <p>Status: {{ $proposal['status'] }}</p>
                                                                        <p>By Freelancer:
                                                                            {{ $proposal['freelancer']['name'] }}
                                                                        </p>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            <fieldset>
                                                                <div class="form-group">
                                                                    <label for="rating">Rating:</label>
                                                                    <select class="form-control" id="rating"
                                                                        name="rating" required>
                                                                        <option value="0.5">0.5</option>
                                                                        <option value="1.0">1.0</option>
                                                                        <option value="1.5">1.5</option>
                                                                        <option value="2.0">2.0</option>
                                                                        <option value="2.5">2.5</option>
                                                                        <option value="3.0">3.0</option>
                                                                        <option value="3.5">3.5</option>
                                                                        <option value="4.0">4.0</option>
                                                                        <option value="4.5">4.5</option>
                                                                        <option value="5.0">5.0</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="comment">Comment:</label>
                                                                    <textarea class="form-control" id="comment" name="comment" placeholder="Add Reviews*" required></textarea>
                                                                </div>
                                                                <div class="form-group wt-btnarea">
                                                                    <button type="submit" class="wt-btn color-white">Close
                                                                        Project </button>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="wt-btnarea">
                                            <div class="wt-hireduserstatus">
                                                <ul class="wt-hireduserimgs">
                                                    @if (!is_null($proposals[0]['freelancer']['profile_image']))
                                                        <li>
                                                            <figure><img
                                                                    src="{{ url(config('app.storage_url') . 'user-profile-pictures/' . $proposals[0]['freelancer']['profile_image']) }}"
                                                                    class="mCS_img_loaded"></figure>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <figure><img src="{{ asset('images/user-avatar.png') }}"
                                                                    class="mCS_img_loaded"></figure>
                                                        </li>
                                                    @endif
                                                </ul>
                                                <p>{{ $proposals[0]['freelancer']['name'] }}</p>
                                                <p style="color: red;">Project
                                                    Closed</p>
                                            </div>
                                        </div>
                                    @endif
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
                                                <em>File size: 512 kb<a target="__blank"
                                                        href="{{ url(config('app.storage_url') . 'documents/' . $document) }}"><i
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
