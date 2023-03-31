@extends('site.layout')
@section('title', 'Freelancer')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <style>
        .wt-profilephotocontent {

            padding: 0px;
        }

        .form-group-label label input {
            display: block;
        }

        @media (max-width: 768px) {
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
    <main id="wt-main" class="wt-main wt-haslayout">
        <!--Register Form Start-->
        <section class="wt-haslayout wt-dbsectionspace">

            <div class="row padding">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-8 float-left ">
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle">
                            <h2>Post Job</h2>
                            @include('site.shared.message')
                        </div>

                        <div class="wt-dashboardboxcontent">
                            <div class="wt-jobdescription wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Job Description</h2>
                                </div>

                                <form class="wt-formtheme wt-userform wt-userform" method="POST"
                                    action="{{ url('clientProject') }}" enctype="multipart/form-data">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group form-group">
                                            <label class="form-label" for="tile">Add your project title<span
                                                    class="label-required">
                                                    *</span></label>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Add your project title" required>
                                        </div>
                                        <div class="form-group form-group">
                                            <label class="form-label" for="budget">Add budget<span class="label-required">
                                                    *</span></label>
                                            <input type="number" name="budget" class="form-control"
                                                placeholder="Add budget" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="category_id">Project category<span
                                                    class="label-required">
                                                    *</span></label>
                                            <span class="wt-select">
                                                <select name="category_id" required>
                                                    <option disabled selected value="">Select category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="duration_id">Project duration<span
                                                    class="label-required">
                                                    *</span></label>
                                            <span class="wt-select">
                                                <select id="duration" name="duration_id" required>
                                                    @foreach ($durations as $duration)
                                                        <option value="{{ $duration['id'] }}">
                                                            {{ $duration['title'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </span>
                                        </div>
                                    </fieldset>
                            </div>
                            <div class="wt-jobdetails wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Job Details</h2>
                                </div>
                                <textarea name="description" class="form-group" style="height: 105px" placeholder="Add Job Detail Here" required></textarea>
                            </div>
                            <div class="wt-attachmentsholder">

                                <div class="wt-profilephoto wt-tabsinfo form-group_half_selectimag ">
                                    <div class="wt-profilephotocontent">

                                        <div class="form-group form-group-label">
                                            <div class="wt-labelgroup">
                                                <label for="filep" style=" display:flex">
                                                    <input type="file" id="filep" name="doc">
                                                </label>
                                                <em class="wt-fileuploading">Uploading<i
                                                        class="fa fa-spinner fa-spin"></i></em>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wt-updatall">
                            <i class="ti-announcement"></i>
                            <span>Post job by just clicking on “Post Job Now” button.</span>
                            <button type="submit" class="wt-btn s">Post Job Now</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </section>
        <!--Register Form End-->
    </main>
    <!--Main End-->
@endsection
@section('script')
    <script src="{{ asset('js/jquery.hoverdir.js') }}"></script>
@endsection
