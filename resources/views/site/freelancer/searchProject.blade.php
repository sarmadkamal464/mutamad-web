@extends('site.layout')
@section('title', 'Freelancer')
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

        .wt-userlistinghold {
            background-color: #fff;
        }

        .wt-contenthead .wt-title a {
            font-size: 21px
        }

        .wt-description p {
            font-size: 18px !important;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .wt-wrapper .wt-main {
            padding-left: 0px !important;
        }

        .wt-btn {

            padding: 0 20px;
            line-height: 36px;
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

        .wt-pagination ul li span {
            line-height: 40px;
        }

        .wt-userlisting-breadcrumb li span,
        .wt-userlisting-breadcrumb li a {
            color: #323232;
            line-height: 1.6;
        }

        .wt-btnarea {
            padding: 36px 0;
        }

        @media (max-width: 1200px) {
            .wt-btnarea {
                padding: 0px;
            }
        }

        @media (max-width: 1199px) {
            .wt-userlisting .wt-userlistingcontent {

                text-align: start !important;
            }
        }

        @media (max-width: 820px) {
            .wt-btn {

                padding: 0 20px;
            }


        }
    </style>
@endsection
@section('content')
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
                                            <h2>Freelancers</h2>
                                        </div>
                                        <div class="wt-widgetcontent">
                                            <form class="wt-formtheme wt-formsearch">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <input type="text" name="search" id="search-input"
                                                            class="form-control" placeholder="Search by name">
                                                        <a id="search" href="javascrip:void(0);"
                                                            class="applyfilters wt-searchgbtn"><i
                                                                class="lnr lnr-magnifier"></i></a>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="wt-widget wt-effectiveholder">
                                        <div class="wt-widgettitle">
                                            <h2>Filter by Skills</h2>
                                        </div>
                                        <div class="wt-widgetcontent">
                                            <form class="wt-formtheme wt-formsearch">
                                                <fieldset>
                                                    <div class="wt-checkboxholder wt-verticalscrollbar">
                                                        @foreach ($categories as $category)
                                                            <span class="wt-checkbox">
                                                                <input id="{{ $category->slug }}" type="checkbox"
                                                                    name="{{ $category->slug }}"
                                                                    value="{{ $category->slug }}">
                                                                <label for="{{ $category->slug }}">
                                                                    {{ $category->name }}</label>
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="wt-widget wt-applyfilters-holder">
                                        <div class="wt-widgetcontent">
                                            <div class="wt-applyfilters">
                                                <span>Click “Apply Filter” to apply latest<br> changes made by you.</span>
                                                <a id='applyfilters' href="javascript:void(0);"
                                                    class="applyfilters wt-btn">Apply
                                                    Filters</a>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">
                                <div class="wt-userlistingholder wt-userlisting wt-haslayout">
                                    <div class="wt-filterholder">
                                        <ul class="wt-filtertag">
                                            <li class="wt-filtertagclear">
                                                <a href="javascript:void(0)" id="clear-all-filters">
                                                    <i class="fa fa-times"></i> <span>Clear All Filters</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                    @if (count($projects) == 0)
                                        <div class="wt-userlistinghold wt-featured">
                                            <div class="wt-userlistingcontent">
                                                <div class="wt-contenthead">
                                                    <div class="wt-title">
                                                        No Freelancer Found with given filters
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @foreach ($projects as $project)
                                        <div class="wt-userlistinghold wt-featured">
                                            <div class="wt-userlistingcontent wt-userlistingcontentvtwo">
                                                <div class="wt-contenthead">
                                                    <div class="wt-title">
                                                        <h2>{{ $project->title }}</h2>

                                                    </div>
                                                    <ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb  wrap">
                                                        <li style=" display: flex;"><span
                                                                class="wt-dashboradclock table-cell"><i
                                                                    class="fa fa-dollar-sign"></i></span>
                                                            <span class="wt-dashboradclock">
                                                                &nbsp; Category:{{ $project->category->name }}</span>
                                                        </li>
                                                        <li style=" display: flex;"><span
                                                                class="wt-dashboradclock table-cell"><i
                                                                    class="far fa-clock"></i></span>
                                                            <span class="wt-dashboradclock">
                                                                &nbsp; Duration:
                                                                &nbsp;{{ $project->duration->title }}</span>
                                                        </li>
                                                        <li style=" display: flex;"><span
                                                                class="wt-clicksavefolder table-cell"><i
                                                                    class="far fa-folder"></i></span> <span
                                                                class="wt-clicksavefolder">&nbsp; Budget: &nbsp;
                                                                {{ $project->budget }}</span></li>
                                                    </ul>

                                                </div>
                                                <div class="wt-rightarea">
                                                    <div class="wt-btnarea">
                                                        <a href="{{ url('/single-project/' . $project->id) }}"
                                                            class="wt-btn pd">VIEW
                                                            DETAILS</a>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <figure class="wt-userlistingimg">
                                                @if ($project->profile_image != null)
                                                    <img src="{{ url(config('app.storage_url') . 'user-profile-pictures/' . $project->profile_image) }}"
                                                        class="profile-image-avatar" style="width: 150px;" />
                                                @else
                                                    <img src="{{ asset('images/user-avatar.png') }}"
                                                        class="profile-image-avatar" style="width: 150px;" />
                                                @endif
                                            </figure>
                                            <div class="wt-userlistingcontent">
                                                <div class="wt-contenthead">
                                                    <div class="wt-title">
                                                        <a href="{{ url('/freelancer/' . $project->username) }}"><i
                                                                class="fa fa-check-circle"></i>
                                                            {{ $project->name }}
                                                        </a>
                                                        <h2>{{ $project->earning }}</h2>
                                                        <span>Member Since: {{ $project->created_at }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wt-description">
                                                <p>{{ $project->bio }}</p>
                                            </div> --}}

                                        </div>
                                    @endforeach
                                    <nav class="wt-pagination">
                                        <ul>

                                            <li id="prev1"><a href="#" id="prev"><i
                                                        class="lnr lnr-chevron-left"></i></a>
                                                <span> Previous</span>
                                            </li>
                                            <li id="next1"><a href="#" id="next"><i
                                                        class="lnr lnr-chevron-right"></i></a>
                                                <span> Next</span>
                                            </li>
                                        </ul>
                                    </nav>

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
    <script>
        let limit = 4;
        var freelancerCount = {{ count($projects) }}
        const urlParams = new URLSearchParams(window.location.search);
        let offset = parseInt(urlParams.get('offset')) || 0;
        const category = urlParams.get('category');
        const country = urlParams.get('country');
        const search = urlParams.get('search');

        function generateUrl() {
            let url = `search-project?limit=${limit}&offset=${offset}`;
            if (category) {
                url += `&category=${category}`;
            }
            if (country) {
                url += `&country=${country}`;
            }
            return url;
        }

        function generateUrlForClearAll() {
            return `search-project?limit=${limit}`;
        }

        function generateUrlForSearch(name) {
            return `search-project?limit=${limit}&search=${name}`;
        }

        function generateUrlForFilter(checkedCategories, country, search) {
            let url = `search-project?limit=${limit}`;
            if (checkedCategories.length > 0) {
                url += `&category=${checkedCategories.join(',')}`;
            }
            if (country) {
                url += `&country=${country}`;
            }
            if (search) {
                url += `&search=${search}`;
            }
            return url;
        }

        function filter(e) {
            e.preventDefault();
            let country = $('#country').val();
            let search = $('#search-input').val();
            const checkedCategories = $('.wt-checkboxholder input:checked').map(function() {
                return $(this).val();
            }).get();
            if (checkedCategories.length > 0 || country || search) {
                window.location.href = generateUrlForFilter(checkedCategories, country, search);
            } else {
                window.location.href = generateUrlForClearAll();
            }
        }
        $('#search').click(function(e) {
            e.preventDefault();
            const name = $('#search-input').val();
            if (name !== "") {
                window.location.href = generateUrlForSearch(name);
            }
        });
        $('.applyfilters').click(filter);

        $('#prev').click(function(e) {
            e.preventDefault();
            if (offset > 0) {
                offset -= limit;
                window.location.href = generateUrl();
            }
        });

        $('#next').click(function(e) {
            e.preventDefault();
            if (freelancerCount <= 3)
                return;
            offset += limit;
            window.location.href = generateUrl();
        });

        $('#search-input').val(search);
        $('#country').val(country);

        let activeFilters = `<li class="wt-filtertagclear">
        <a href="javascript:void(0)" id="clear-all-filters">
            <i class="fa fa-times"></i> <span>Clear All Filters</span>
        </a>
    </li>`;
        if (category) {
            const categories = category.split(',');

            categories.forEach(function(category) {
                activeFilters += `<li class="alert alert-dismissable fade in">
            <a href="javascript:void(0)">
                <i class="fa fa-times close" data-dismiss="alert" aria-label="close"></i>
                <span>${category}</span>
            </a>
        </li>`;
            });
            $('.wt-filtertag').html(activeFilters);
            $('.wt-checkboxholder input').each(function() {
                if (categories.includes($(this).val())) {
                    $(this).prop('checked', true);
                }
            });
        }
        if (country) {
            activeFilters += `<li class="alert alert-dismissable fade in">
            <a href="javascript:void(0)">
                <i class="fa fa-times close" data-dismiss="alert" aria-label="close"></i>
                <span>${country}</span>
            </a>
        </li>`;
            $('.wt-filtertag').html(activeFilters);
        }
        if (search) {
            activeFilters += `<li class="alert alert-dismissable fade in">
            <a href="javascript:void(0)">
                <i class="fa fa-times close" data-dismiss="alert" aria-label="close"></i>
                <span>${search}</span>
            </a>
        </li>`;
            $('.wt-filtertag').html(activeFilters);
        }

        // Clear all filter tags and reset checkboxes
        $('.wt-filtertagclear').on('click', function(e) {
            $('.wt-filtertag').empty();
            $('.wt-checkboxholder input').prop('checked', false);
            $('#country').val("");
            $('#search-input').val("");
            window.location.href = generateUrlForClearAll();
        });

        // Remove a specific filter tag
        $('.wt-filtertag li ').on('click', function(e) {
            const value = $(this).find('span').text();
            if (value === $('#country').val()) {
                $('#country').val("");
            }
            if (value === $('#search-input').val()) {
                $('#search-input').val("");
            } else {
                $('.wt-checkboxholder input').filter(function() {
                    return $(this).val() === value;
                }).prop('checked', false);
            }
            $(this).remove();
            filter(e);
        });



        if (offset == 0) {
            $('#prev1').css('visibility', 'hidden'); // show prev button when next button is clicked
            // add your other code here
        } else {
            $('#prev1').css('visibility', 'visible');
        };

        if (freelancerCount > 3) {
            $('#next').css('background-color', '#0583ce');
        } else {
            $('#prev').css('background-color', '#0583ce');
            $('#next1').css('visibility', 'hidden');

        }
    </script>
@endsection
