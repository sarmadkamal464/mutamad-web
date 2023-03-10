@extends('site.layout')
@section('title', 'Freelancer')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <style>
        .wt-wrapper .wt-main {
            padding-left: 0px !important;
        }

        @media (max-width: 820px) {
            .wt-btn {

                padding: 0 20px;
            }

        }
    </style>
@endsection
@section('content')
    <!--Inner Home Banner Start-->
    @include('site.shared.topbanner')
    <!--Inner Home End-->
    <!--Main Start-->
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <div class="wt-main-section wt-haslayout">
            <!-- User Listing Start-->
            <div class="wt-haslayout">
                <div class="container">
                    <div class="row">
                        <div id="wt-twocolumns" class="wt-twocolumns wt-haslayout">
                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                                <div class="wt-usersidebaricon">
                                    <span class="fa fa-search wt-usersidebardown">
                                    </span>
                                </div>
                                <aside id="wt-sidebar" class="wt-sidebar wt-usersidebar">
                                    <div class="wt-widget wt-effectiveholder">
                                        <div class="wt-widgettitle">
                                            <h2>Categories</h2>
                                        </div>
                                        <div class="wt-widgetcontent">
                                            <form class="wt-formtheme wt-formsearch">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <input type="text" name="Search" class="form-control"
                                                            placeholder="Search Category">
                                                        <a href="javascrip:void(0);" class="wt-searchgbtn"><i
                                                                class="lnr lnr-magnifier"></i></a>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="wt-checkboxholder wt-verticalscrollbar">
                                                        <span class="wt-checkbox">
                                                            <input id="wordpress" type="checkbox" name="description"
                                                                value="company" checked>
                                                            <label for="wordpress"> WordPress</label>
                                                        </span>
                                                        <span class="wt-checkbox">
                                                            <input id="graphic" type="checkbox" name="description"
                                                                value="company">
                                                            <label for="graphic"> Graphic Design</label>
                                                        </span>
                                                        <span class="wt-checkbox">
                                                            <input id="website" type="checkbox" name="description"
                                                                value="company">
                                                            <label for="website"> Website Design</label>
                                                        </span>
                                                        <span class="wt-checkbox">
                                                            <input id="article" type="checkbox" name="description"
                                                                value="company">
                                                            <label for="article"> Article Writing</label>
                                                        </span>
                                                        <span class="wt-checkbox">
                                                            <input id="software" type="checkbox" name="description"
                                                                value="company">
                                                            <label for="software"> Software Architecture</label>
                                                        </span>
                                                        <span class="wt-checkbox">
                                                            <input id="wordpress1" type="checkbox" name="description"
                                                                value="company">
                                                            <label for="wordpress1"> WordPress</label>
                                                        </span>
                                                        <span class="wt-checkbox">
                                                            <input id="graphic1" type="checkbox" name="description"
                                                                value="company">
                                                            <label for="graphic1"> Graphic Design</label>
                                                        </span>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="wt-widget wt-applyfilters-holder">
                                        <div class="wt-widgetcontent">
                                            <div class="wt-applyfilters">
                                                <span>Click “Apply Filter” to apply latest<br> changes made by you.</span>
                                                <a href="javascript:void(0);" class="wt-btn">Apply Filters</a>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                                <div class="wt-userlistingholder wt-userlisting wt-haslayout">
                                    <div class="wt-userlistingtitle">
                                        <span>01 - 48 of 57143 results for <em>"Logo Design"</em></span>
                                    </div>
                                    <div class="wt-filterholder">
                                        <ul class="wt-filtertag">
                                            <li class="wt-filtertagclear">
                                                <a href="javascrip:void(0)"><i class="fa fa-times"></i> <span>Clear All
                                                        Filter</span></a>
                                            </li>
                                            <li class="alert alert-dismissable fade in">
                                                <a href="javascrip:void(0)"><i class="fa fa-times close"
                                                        data-dismiss="alert" aria-label="close"></i> <span>Graphic
                                                        Design</span></a>
                                            </li>
                                            <li class="alert alert-dismissable fade in">
                                                <a href="javascrip:void(0)"><i class="fa fa-times close"
                                                        data-dismiss="alert" aria-label="close"></i> <span>Any Hourly
                                                        Rate</span></a>
                                            </li>
                                            <li class="alert alert-dismissable fade in">
                                                <a href="javascrip:void(0)"><i class="fa fa-times close"
                                                        data-dismiss="alert" aria-label="close"></i> <span>Any Freelancer
                                                        Type</span></a>
                                            </li>
                                            <li class="alert alert-dismissable fade in">
                                                <a href="javascrip:void(0)"><i class="fa fa-times close"
                                                        data-dismiss="alert" aria-label="close"></i>
                                                    <span>Chinese</span></a>
                                            </li>
                                            <li class="alert alert-dismissable fade in">
                                                <a href="javascrip:void(0)"><i class="fa fa-times close"
                                                        data-dismiss="alert" aria-label="close"></i>
                                                    <span>English</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="wt-userlistinghold wt-featured">
                                        <span class="wt-featuredtag"><img src="{{ asset('images/featured.png') }}"
                                                alt="img description" data-tipso="Plus Member"
                                                class="template-content tipso_style"></span>
                                        <figure class="wt-userlistingimg">
                                            <img src="{{ asset('images/user/userlisting/img-01.jpg') }}"
                                                alt="image description">
                                        </figure>
                                        <div class="wt-userlistingcontent">
                                            <div class="wt-contenthead">
                                                <div class="wt-title">
                                                    <a href="usersingle.html"><i class="fa fa-check-circle"></i> Alfredo
                                                        Bossard
                                                    </a>
                                                    <h2>Classifieds Posting, Data Entry, Typing</h2>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="wt-description">
                                            <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliquaenim ad minim veniamac quis nostrud exercitation ullamco
                                                laboris...</p>
                                        </div>
                                        <div class="wt-tag wt-widgettag">
                                            <a href="javascript:void(0);">PHP</a>
                                            <a href="javascript:void(0);">HTML</a>
                                            <a href="javascript:void(0);">JavaScript</a>
                                            <a href="javascript:void(0);">WordPress</a>
                                            <a href="javascript:void(0);">Team Management</a>
                                            <a href="javascript:void(0);">JQuery</a>
                                            <a href="javascript:void(0);">...</a>
                                        </div>
                                    </div>

                                    <nav class="wt-pagination">
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Listing End-->
        </div>
    </main>
    <!--Main End-->
@endsection
@section('script')
    <script src="{{ asset('js/jquery.hoverdir.js') }}"></script>
@endsection
