 <script src="{{ asset('js/vendor/jquery-3.3.1.js') }}"></script>
 <script src="{{ asset('js/vendor/jquery-library.js') }}"></script>
 <script src="{{ asset('js/vendor/bootstrap.min.js') }}""></script>
 <script src="{{ asset('js/owl.carousel.min.js') }}""></script>
 <script src="{{ asset('js/chosen.jquery.js') }}""></script>
 <script src="{{ asset('js/scrollbar.min.js') }}""></script>
 <script src="{{ asset('js/tilt.jquery.js') }}""></script>
 <script src="{{ asset('js/prettyPhoto.js') }}""></script>
 <script src="{{ asset('js/jquery-ui.js') }}""></script>
 <script src="{{ asset('js/readmore.js') }}""></script>
 <script src="{{ asset('js/countTo.js') }}""></script>
 <script src="{{ asset('js/appear.js') }}""></script>
 <script src="{{ asset('js/tipso.js') }}""></script>
 <script src="{{ asset('js/jRate.js') }}""></script>
 <script src="{{ asset('js/main.js') }}""></script>

 <script>
     // nav active class 
     $(document).ready(function() {
         var endpoint = window.location.href;
         console.log(endpoint);
         $('.navbar-nav li').each(function() {
             if ($(this).find('a').attr('href') === endpoint) {
                 $(this).addClass('nav-item-active ');
             }
         });
     });
 </script>
