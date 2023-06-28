@extends('site.layout')
@section('title', 'Mutamad')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dbresponsive.css') }}">
    <style>
        .wt-haslayout .wt-dbsectionspace {
            max-width: 1400px;
        }

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

        .center {
            padding-right: 15px !important;
            padding-left: 15px !important;
            justify-content: center;
            display: flex;
        }
    </style>
@endsection

@section('content')
    <!--Main Start-->
    <main id="wt-main" class="center wt-main wt-haslayout">
        <!--Register Form Start-->
        <section class="wt-haslayout">
            <div class="row">
                <div class="center col-xs-12 col-sm-12 col-md-12 ">
                    <div class="wt-haslayout wt-dbsectionspace">
                        <div class="wt-dashboardbox wt-dashboardtabsholder">
                            <div class="wt-dashboardboxtitle">
                                <h2>{{ $user->name }} Profile</h2>
                                @include('site.shared.message')
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
                                            <h2>Update your Profile</h2>
                                        </div>
                                        <form class="wt-formtheme wt-userform" method="POST"
                                            action="{{ url('update-profile') }}" enctype="multipart/form-data">
                                            @csrf
                                            <fieldset>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group form-group-half-imag">
                                                        @if ($user->profile_image != null)
                                                            <img src="{{ url(config('app.storage_url') . 'user-profile-pictures/' . $user->profile_image) }}"
                                                                class="profile-image-avatar" style="width: 150px;"
                                                                alt="Avatar" />
                                                        @else
                                                            <img src="{{ asset('images/user-avatar.png') }}"
                                                                class="profile-image-avatar" style="width: 150px;"
                                                                alt="Avatar" />
                                                        @endif
                                                    </div>
                                                    <div id="drop-area"
                                                        class="wt-profilephoto wt-tabsinfo form-group_half_selectimag ">
                                                        <div class="wt-profilephotocontent">
                                                            <fieldset>
                                                                <div class="form-group form-group-label">
                                                                    <div class="wt-labelgroup">
                                                                        <label for="filep">
                                                                            <span class="btn-primary btn-sm">Select
                                                                                Files</span>
                                                                            <input type="file"
                                                                                accept="image/png, image/gif, image/jpeg"
                                                                                id="filep" name="image"
                                                                                onchange="handleFiles(this.files)">
                                                                        </label>
                                                                        <span>Drop files here to upload</span>
                                                                        <em class="wt-fileuploading">Uploading<i
                                                                                class="fa fa-spinner fa-spin"></i></em>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                @auth
                                                        @if (Auth::user()->role == 'client')
                                                         
                                                        @elseif (Auth::user()->role == 'freelancer')
                                                        <div class="form-group form-group-half">
                                                <p id="reviewsAvg">Average Reviews: </p>

                                                </div>
                                                        @endif
                                                    @endauth
                                                    @auth
                                                        @if (Auth::user()->role == 'client')
                                                        <div class="form-group form-group-half">
                                               <p>Total Spending: </p>

                                               </div>
                                                        @elseif (Auth::user()->role == 'freelancer')
                                                        <div class="form-group form-group-half">
                                                        <p>Total Earnings: </p>

                                                </div>
                                                        @endif
                                                    @endauth
                                                <div class="form-group form-group-half">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Name*" value="{{ $user->name }}" required>
                                                </div>
                                               
                                                <div class="form-group form-group-half">
                                                    <input type="email" class="form-control" placeholder="Email*"
                                                        value="{{ $user->email }}" disabled>
                                                </div>
                                                <div class="form-group form-group-half">
                                                    <span class="wt-select">
                                                        <select id="country" name="country" required>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country['code'] }}"
                                                                    {{ $country['code'] == $user->country['code'] ? 'selected' : '' }}>
                                                                    {{ $country['name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="bio" placeholder="Bio (optional)">{{ $user->bio }}</textarea>
                                                </div>
                                                <div class="form-group form-group-half wt-btnarea">
                                                    <button class="wt-btn wt-btn-sm ">Submit</button>
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
                                        <form id='deactivate_form' class="wt-formtheme wt-userform"
                                            action="{{ url('deactivate-account') }}" method="POST" onsubmit="logout()">
                                            @csrf
                                            <fieldset>
                                                <h5>Choose reason</h5>
                                                <div class="form-group form-group-half">
                                                    <span class="wt-select">
                                                        <select name="deactivate_reason" id="deactivate_reason" required>
                                                            <option value="" disabled selected>Why you want to leave
                                                            </option>
                                                        </select>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="other" name="other" id="other" class="form-control" placeholder="Enter description"></textarea>
                                                </div>
                                                <div class="form-group form-group-half wt-btnarea">
                                                    <button class="wt-btn wt-btn-sm ">Deactivate Now</button>
                                                </div>
                                            </fieldset>
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
<meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = '{{ url('') }}/client-spending';
  

            $.ajax({
                url: url,
                type: 'get',
            
                
                success: function(res) {
                    console.log(res)
                },
        
            });
const encodedReviewsData = '{{ $user->reviews }}';
const reviewsData = JSON.parse(encodedReviewsData.replace(/&quot;/g, '"'));


// Calculate the average rating
const totalReviews = reviewsData.length;
let totalRating = 0;

reviewsData.forEach(review => {
  totalRating += review.rating;
});

const averageRating = totalReviews > 0 ? totalRating / totalReviews : NaN;

// Update the HTML element with the average rating
const reviewsAvgElement = document.getElementById('reviewsAvg');
if (!isNaN(averageRating)) {
  reviewsAvgElement.textContent += averageRating.toFixed(1);
} 




        function logout() {
            // Make a POST request to the logout API using fetch or XMLHttpRequest
            // For example, using fetch:
            fetch('{{ url('deactivate-account') }}', {
                    method: 'POST'
                })
                .then(response => {
                    // Redirect the user to the logout page or the home page
                    window.location.href = '{{ url('deactivate-account') }}';
                })
                .catch(error => {
                    console.error(error);
                    // Display an error message to the user
                    alert('An error occurred while logging out. Please try again later.');
                });
            fetch('{{ url('logout') }}', {
                    method: 'POST'
                })
                .then(response => {
                    // Redirect the user to the logout page or the home page
                    window.location.href = '{{ url('logout') }}';
                })
                .catch(error => {
                    console.error(error);
                    // Display an error message to the user
                    alert('An error occurred while logging out. Please try again later.');
                });
        }
        $(document).ready(function() {
            // Get the drop area and input element
            var reasons = [{
                    id: 0,
                    value: "Not interested anymore"
                },
                {
                    id: 1,
                    value: "Switching to a different platform or service"
                },
                {
                    id: 2,
                    value: "Difficulty navigating or using the platform"
                },
                {
                    id: 3,
                    value: "Limiting social media use for mental health reasons"
                },
                {
                    id: 4,
                    value: "Taking a break from social media or the internet in general"
                },
                {
                    id: 5,
                    value: "Others"
                },
            ]
            var html = '';
            $.each(reasons, function(id, data) {
                html +=
                    `<option value="${data['value']}">${data['value']}</option>`
            });


            $('#deactivate_reason').append(html);
            var dropArea = $('.wt-labelgroup');
            var input = $('#filep');
            // Prevent default drag behaviors
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.on(eventName, function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                });
            });
            // Highlight the drop area when dragging over it
            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.on(eventName, function() {
                    dropArea.addClass('highlight');
                });
            });
            // Remove the highlight when dragging out of the drop area
            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.on(eventName, function() {
                    dropArea.removeClass('highlight');
                });
            });
            // Handle dropped files
            dropArea.on('drop', function(e) {
                var files = e.originalEvent.dataTransfer.files;
                // Show the preview of the dropped image
                showPreview(files[0]);
                // Update the input with the dropped file
                input.prop('files', files);
            });
            // Handle file input change
            input.on('change', function() {
                var files = input[0].files;
                // Show the preview of the selected image
                showPreview(files[0]);
            });
            // Function to show the preview of an image
            function showPreview(file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.profile-image-avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                positionFooter();
            });
        });
    </script>
@endsection
