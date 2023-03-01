 <!-- Header Start -->
 <header id="wt-header" class="wt-header wt-haslayout">
     <div class="wt-navigationarea">
         <div class="container-fluid">
                 <div class="d-flex justify-content-between align-items-center">
                     <strong class="wt-logo"><a href="{{ url('') }}"><img src="{{ asset('images/logo.png') }}"
                                 alt="company logo here"></a></strong>
                     <div class="wt-rightarea ml-3">
                         <nav id="wt-nav" class="wt-nav navbar-expand-lg">
                             <button class="navbar-toggler" type="button" data-toggle="collapse"
                                 data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                 aria-label="Toggle navigation">
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
                                     {{-- <li class="nav-item">
                                         <a href="javascript:void(0);">Find Freelancer</a>
                                     </li> --}}
                                     <li class="nav-item">
                                         <a href="{{ url('/about-us') }}">Contact Us</a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{ url('/about-us') }}">About Us</a>
                                     </li>
                                 </ul>
                             </div>
                         </nav>
                         <div class="wt-loginarea" style="">
                             <figure class="wt-userimg">
                                 <img src="{{ asset('images/user-login.png') }}" alt="img description">
                             </figure>
                             <div class="wt-loginoption">
                                 <a href="javascript:void(0);" id="wt-loginbtn" class="wt-loginbtn">Login</a>
                                 <div class="wt-loginformhold">
                                     <div class="wt-loginheader">
                                         <span>Login</span>
                                         <a href="javascript:;"><i class="fa fa-times"></i></a>
                                     </div>
                                     <form class="wt-formtheme wt-loginform do-login-form">
                                         <fieldset>
                                             <div class="form-group">
                                                 <input type="text" name="username" class="form-control"
                                                     placeholder="Username">
                                             </div>
                                             <div class="form-group">
                                                 <input type="password" name="password" class="form-control"
                                                     placeholder="Password">
                                             </div>
                                             <div class="wt-logininfo">
                                                 <a href="javascript:;" class="wt-btn do-login-button">Login</a>
                                                 <span class="wt-checkbox">
                                                     <input id="wt-login" type="checkbox" name="rememberme">
                                                     <label for="wt-login">Keep me logged in</label>
                                                 </span>
                                             </div>
                                         </fieldset>
                                         <div class="wt-loginfooterinfo">
                                             <a href="javascript:;" class="wt-forgot-password">Forgot password?</a>
                                             <a href="javascript:void(0);">Create account</a>
                                         </div>
                                     </form>
                                     <form class="wt-formtheme wt-loginform do-forgot-password-form wt-hide-form">
                                         <fieldset>
                                             <div class="form-group">
                                                 <input type="email" name="email" class="form-control get_password"
                                                     placeholder="Email">
                                             </div>

                                             <div class="wt-logininfo">
                                                 <a href="javascript:;" class="wt-btn do-get-password">Get Pasword</a>
                                             </div>
                                         </fieldset>
                                         <div class="wt-loginfooterinfo">
                                             <a href="javascript:void(0);" class="wt-show-login">Login</a>
                                             <a href="javascript:void(0);">Create account</a>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                             <a href="javascript:void(0);" class="wt-btn">Join Now</a>
                         </div>
                     </div>
             </div>
         </div>
     </div>
 </header>
 <!--Header End-->
