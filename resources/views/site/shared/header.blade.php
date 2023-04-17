 <!-- Header Start -->
 <header id="wt-header" class="wt-header wt-haslayout">
     <div class="wt-navigationarea">
         <div class="container-fluid">
             <div class="d-flex justify-content-between align-items-center">
                 <strong class="wt-logo"><a href="{{ url('') }}"><img src="{{ asset('images/logo.png') }}"
                             alt="company logo here"></a></strong>
                 <div class="wt-rightarea ml-3" style="display: flex; vertical-align: middle; align-items: center;">
                     <nav id="wt-nav" class="wt-nav navbar-expand-lg">
                         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                             <i class="lnr lnr-menu"></i>
                         </button>
                         <div class="collapse navbar-collapse wt-navigation" id="navbarNav">
                             <ul class="navbar-nav">
                                 <li class="nav-item">
                                     <a href="{{ url('') }}">Home</a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="{{ url('/hows-it-work') }}">How's it work</a>
                                 </li>
                                 @auth
                                     @if (Auth::user()->role == 'freelancer')
                                         <li class="nav-item">
                                             <a href="{{ url('/search-project?limit=4') }}">Browse Projects</a>
                                         </li>
                                     @elseif(Auth::user()->role == 'client')
                                         <li class="nav-item">
                                             <a href="{{ url('/search-freelancer?limit=4') }}">Browse Freelancers</a>
                                         </li>
                                     @endif
                                 @endauth
                                 <li class="nav-item">
                                     <a href="{{ url('/about-us') }}">About Us</a>
                                 </li>
                             </ul>
                         </div>
                     </nav>
                     @auth
                         <div class="wt-userlogedin">
                             <figure class="wt-userimg">
                                 @if (Auth::user()->profile_image && Auth::user()->profile_image != null)
                                     <img src="{{ url(config('app.storage_url') . 'user-profile-pictures/' . Auth::user()->profile_image) }}"
                                         alt="image description">
                                 @else
                                     <img src="{{ asset('images/user-avatar.png') }}" alt="image description">
                                 @endif
                             </figure>
                             <div class="wt-username">
                                 <h3>{{ Auth::user()->short_name }}</h3>
                                 <span></span>
                             </div>
                             <nav class="wt-usernav">
                                 <ul>
                                     <li>
                                         <a href="{{ url('profile') }}">
                                             <span>My Profile</span>
                                         </a>
                                     </li>
                                     @if (Auth::user()->role == 'client')
                                         <li>
                                             <a href="{{ url('post-project') }}">
                                                 <span>Post Project</span>
                                             </a>
                                         </li>

                                         <li class="menu-item-has-children">
                                             <a href="javascript:void(0)">
                                                 <span>All Projects</span>
                                             </a>
                                             <ul class="sub-menu">
                                                 <li><a href="{{ url('/open-projects') }}">Open Projects</a></li>
                                                 <li><a href="{{ url('/ongoing-projects') }}">Ongoing Project</a></li>
                                                 <li><a href="{{ url('/completed-projects') }}">Completed Projects</a></li>
                                             </ul>
                                         </li>
                                     @elseif (Auth::user()->role == 'freelancer')
                                         <li class="menu-item-has-children">
                                             <a href="javascript:void(0)">
                                                 <span>All Projects</span>
                                             </a>
                                             <ul class="sub-menu">
                                                 <li><a href="{{ url('/open-jobs') }}">All Project</a></li>
                                                 <li><a href="{{ url('/ongoing-jobs') }}">Ongoing Projects</a></li>
                                                 <li><a href="{{ url('/completed-jobs') }}">Completed Projects</a></li>
                                             </ul>
                                         </li>
                                     @endif
                                     <li>
                                         <a href="{{ url('logout') }}">
                                             <span>Log out</span>
                                         </a>
                                     </li>
                                 </ul>
                             </nav>
                         </div>
                     @else
                         <div class="wt-loginarea" style="">
                             <div class="wt-loginoption">
                                 {{-- <a href="/login" class="wt-loginbtn">Login</a> --}}
                             </div>
                             <a href="{{ url('/login') }}" class="wt-btn">Log in</a>
                             {{-- <a href="/signup" class="wt-btn wt-joinbtn">Join Now</a> --}}
                         </div>
                     @endauth
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!--Header End-->
