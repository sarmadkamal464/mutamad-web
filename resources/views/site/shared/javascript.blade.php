 <script src="{{ asset('js/vendor/jquery-3.3.1.js') }}"></script>
 <script src="{{ asset('js/vendor/jquery-library.js') }}"></script>
 <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
 <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('js/chosen.jquery.js') }}"></script>
 <script src="{{ asset('js/scrollbar.min.js') }}"></script>
 <script src="{{ asset('js/tilt.jquery.js') }}"></script>
 <script src="{{ asset('js/prettyPhoto.js') }}"></script>
 <script src="{{ asset('js/jquery-ui.js') }}"></script>
 <script src="{{ asset('js/readmore.js') }}"></script>
 <script src="{{ asset('js/countTo.js') }}"></script>
 <script src="{{ asset('js/appear.js') }}"></script>
 <script src="{{ asset('js/tipso.js') }}"></script>
 <script src="{{ asset('js/jRate.js') }}"></script>
 <script src="{{ asset('js/main.js') }}"></script>

 <script>
     // get the navigation menu element
     const navMenu = document.querySelector('#wt-nav');
     // add a click event listener to the document object
     document.addEventListener('click', function(event) {
         // check if the click target is inside the navigation menu

         if (!navMenu.contains(event.target)) {
             // if the click target is outside the navigation menu, close the menu
             navMenu.querySelector('.navbar-collapse').classList.remove('show');
         }
     });
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
