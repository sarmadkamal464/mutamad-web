<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('css/scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/fontawesome/fontawesome-all.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('css/tipso.css') }}">
<link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
<link rel="stylesheet" href="{{ asset('css/prettyPhoto.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/color.css') }}">
<link rel="stylesheet" href="{{ asset('css/transitions.css') }}">
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
<script src="{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
<style>
    body {
        background: #f7f7f7;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* Slider of signup page */
    .wt-select:after {
        pointer-events: none;
    }

    /* Navbar logout slider */
    .wt-usernav {
        pointer-events: none;
    }

    .wt-userlogedin:hover .wt-usernav {
        pointer-events: unset;
    }

    /* Application input */
    input:focus,
    .select select:focus,
    .form-control:focus {
        color: #080808;
        border-color: #4d4a4a;

    }

    input,
    .select select,
    .form-control,
    option,
    select {
        color: #080808 !important;
    }

    @media only screen and (min-width: 455px) {
        .wt-header {
            padding: 0;
            z-index: 10;
            position: fixed;
            background-color: white;
            box-shadow: 0 0 8px 0px rgb(0 0 0 / 15%);
        }

        .wt-logo img {
            background-repeat: no-repeat;
            background-position: center;
            height: 80px;
            margin-left: 20px;
        }

        .small-wt-btn {
            padding: 0.25rem 0.5rem;
            font-size: .875rem;
            line-height: 1.5;
            border-radius: 0.2rem;

        }
    }

    .white {
        color: white !important;
    }

    .nav-item-active a {
        color: #0583ce !important
    }

    @media only screen and (max-width: 768px) {

        /* For mobile phones: */
        .wt-header {
            position: relative;
        }
    }
</style>
