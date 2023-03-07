 <!-- Header Start -->
 <header id="wt-header" class="wt-header wt-haslayout">
     <div class="wt-navigationarea">
         <div class="container-fluid">
             <div class="d-flex justify-content-between align-items-center">
                 <strong class="wt-logo"><a href="{{ url('') }}"><img src="{{ asset('images/logo.png') }}"
                             alt="company logo here"></a></strong>
                 <div class="wt-rightarea ml-3">
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
                                 <li class="nav-item">
                                     <a href="{{ url('/about-us') }}">About Us</a>
                                 </li>
                             </ul>
                         </div>
                     </nav>
                     <div class="wt-loginarea" style="">
                         <div class="wt-loginoption">
                             <a href="/login" class="wt-loginbtn">Login</a>

                         </div>
                         <a href="/signup" class="wt-btn">Join Now</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!--Header End-->
