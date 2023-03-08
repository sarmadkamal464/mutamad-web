@extends('site.layout')
@section('title', 'Mutamad')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <style>
        main {
            margin-top: 5%;
        }

        .form-group-half-imag {
            width: 20% !important;
        }

        .form-group_half_selectimag {
            /* by dev */
            width: 80% !important;
            margin-bottom: 0px !important;
        }

        .form-group-half {
            /* by dev */
            width: 100% !important;
        }
    </style>
@endsection

@section('content')
    <!--Main Start-->
    <main id="wt-main" class="wt-main wt-haslayout">
        <!--Register Form Start-->
        <section class="wt-haslayout">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <div class="wt-haslayout wt-dbsectionspace">
                        <div class="wt-dashboardbox wt-dashboardtabsholder">
                            <div class="wt-dashboardboxtitle">
                                <h2>My Profile</h2>
                            </div>
                            <div class="wt-dashboardtabs">
                                <ul class="wt-tabstitle nav navbar-nav">
                                    <li class="nav-item">
                                        <a class="active show" data-toggle="tab" href="#wt-profile">Profile
                                            Setting</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="show" data-toggle="tab" href="#wt-account">Account
                                            Setting</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="wt-tabscontent tab-content">
                                <div class="wt-personalskillshold tab-pane fade active show" id="wt-profile">
                                    <div class="wt-yourdetails wt-tabsinfo">
                                        <div class="wt-tabscontenttitle">
                                            <h2>Updating your Profile</h2>
                                        </div>
                                        <form class="wt-formtheme wt-userform">
                                            <fieldset>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group form-group-half-imag">
                                                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                                                            class="rounded-circle" style="width: 150px;" alt="Avatar" />
                                                    </div>
                                                    <div class="wt-profilephoto wt-tabsinfo form-group_half_selectimag ">
                                                        <div class="wt-profilephotocontent">
                                                            <form class="wt-formtheme wt-formprojectinfo wt-formcategory">
                                                                <fieldset>
                                                                    <div class="form-group form-group-label">
                                                                        <div class="wt-labelgroup">
                                                                            <label for="filep">
                                                                                <button type="button"
                                                                                    class="btn btn-primary btn-sm">Select
                                                                                    Image</button>
                                                                                <input type="file" name="file"
                                                                                    id="filep">
                                                                            </label>
                                                                            <span>Drop files here to upload</span>
                                                                            <em class="wt-fileuploading">Uploading<i
                                                                                    class="fa fa-spinner fa-spin"></i></em>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group form-group-half">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Name*">
                                                </div>
                                                <div class="form-group form-group-half">
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="Email*">
                                                </div>
                                                <div class="form-group form-group-half">
                                                    <span class="wt-select">
                                                        <select id="country" name="country" required>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country['name'] }}">
                                                                    {{ $country['name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control" placeholder="Bio (optional)"></textarea>
                                                </div>
                                                <div class="form-group form-group-half wt-btnarea">
                                                    <button type="button" class="wt-btn wt-btn-sm ">Submit</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                <div class="wt-personalskillshold tab-pane fade show" id="wt-account">
                                    <div class="wt-yourdetails wt-tabsinfo">
                                        <div class="wt-tabscontenttitle">
                                            <h2>Deactivate Account</h2>
                                        </div>
                                        <form class="wt-formtheme wt-userform">
                                            <fieldset>
                                                <h5>Choose reason</h5>
                                                <div class="form-group form-group-half">
                                                    <span class="wt-select">
                                                        <select>
                                                            <option value="" disabled="">
                                                            </option>
                                                            <option value="">Why you want to leave</option>
                                                            <option value="">Reason 2</option>
                                                        </select>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control" placeholder="Enter description"></textarea>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="wt-profilephotocontent">
                                        <form class="wt-formtheme wt-formprojectinfo wt-formcategory">
                                            <a class="wt-btn wt-btn-sm" href="javascript:void(0);">Deactivate Now</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
