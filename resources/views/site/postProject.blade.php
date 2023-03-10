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
    <main id="wt-main" class="wt-main wt-haslayout">

        <!--Register Form Start-->
        <section class="wt-haslayout wt-dbsectionspace">
            <div class="row padding">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-8 float-left ">
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle">
                            <h2>Post Job</h2>
                        </div>
                        <div class="wt-dashboardboxcontent">
                            <div class="wt-jobdescription wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Job Description</h2>
                                </div>
                                <form class="wt-formtheme wt-userform wt-userformvtwo">
                                    <fieldset>
                                        <div class="form-group form-group">
                                            <label class="form-label" for="password">Add your project title*</label>
                                            <input id="password" type="password" name="password" class="form-control"
                                                placeholder="Add your project title" required>
                                        </div>
                                        <div class="form-group form-group">
                                            <label class="form-label" for="password">Add budget*</label>
                                            <input id="password" type="password" name="password" class="form-control"
                                                placeholder="Add budget" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="country">Project category*</label>
                                            <span class="wt-select">
                                                <select id="country" name="country" required>

                                                </select>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="country">Project duration*</label>
                                            <span class="wt-select">
                                                <select id="country" name="country" required>

                                                </select>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="country">Country*</label>
                                            <span class="wt-select">
                                                <select id="country" name="country" required>

                                                </select>
                                            </span>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <div class="wt-jobdetails wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Job Details</h2>
                                </div>
                                <form class="wt-formtheme wt-userform wt-userformvtwo">
                                    <fieldset>
                                        <div class="form-group">
                                            <textarea id="wt-tinymceeditor" class="wt-tinymceeditor" placeholder="Add Job Detail Here"></textarea>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                            <div class="wt-attachmentsholder">
                                <div class="wt-tabscontenttitle">
                                    <h2>Upload Attachments (optional)</h2>
                                    <div class="wt-rightarea">
                                        <span>Show “Attachments” after hiring</span>
                                        <div class="wt-on-off float-right">
                                            <input type="checkbox" id="hide-on" name="contact_form">
                                            <label for="hide-on"><i></i></label>
                                        </div>
                                    </div>
                                </div>
                                <form class="wt-formtheme wt-formprojectinfo wt-formcategory">
                                    <fieldset>
                                        <div class="form-group form-group-label">
                                            <div class="wt-labelgroup">
                                                <label for="file">
                                                    <span class="wt-btn">Select Files</span>
                                                    <input type="file" name="file" id="file">
                                                </label>
                                                <span>Drop files here to upload</span>
                                                <em class="wt-fileuploading">Uploading<i
                                                        class="fa fa-spinner fa-spin"></i></em>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <ul class="wt-attachfile">
                                                <li class="wt-uploading">
                                                    <span class="uploadprogressbar"></span>
                                                    <span>Wireframe Document.doc</span>
                                                    <em>File size: 512 kb<a href="javascript:void(0);"
                                                            class="lnr lnr-cross"></a></em>
                                                </li>
                                                <li>
                                                    <span class="uploadprogressbar"></span>
                                                    <span>Requirments.pdf</span>
                                                    <em>File size: 110 kb<a href="javascript:void(0);"
                                                            class="lnr lnr-cross"></a></em>
                                                </li>
                                                <li class="wt-uploaded">
                                                    <span class="uploadprogressbar"></span>
                                                    <span>Company Intro.docx</span>
                                                    <em>File size: 224 kb<a href="javascript:void(0);"
                                                            class="lnr lnr-cross"></a></em>
                                                </li>
                                            </ul>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="wt-updatall">
                        <i class="ti-announcement"></i>
                        <span>Post job by just clicking on “Post Job Now” button.</span>
                        <a class="wt-btn" href="javascript:void(0);">Post Job Now</a>
                    </div>
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
