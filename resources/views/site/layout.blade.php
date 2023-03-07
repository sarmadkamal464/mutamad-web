<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <title>@yield('title')</title>
    @include('site.shared.stylesheet')
    @yield('style')
</head>

<body class="wt-login">
    <!-- Preloader Start -->
    {{-- <div class="preloader-outer">
        <div class="loader"></div>
    </div> --}}
    <!-- Preloader End -->
    <!-- Wrapper Start -->
    <div id="wt-wrapper" class="wt-wrapper wt-haslayout">
        <!-- Content Wrapper Start -->
        <div class="wt-contentwrapper">
            @include('site.shared.header')
            @yield('content')
            @include('site.shared.footer')
        </div>
        <!--Content Wrapper End-->
    </div>
    <!--Wrapper End-->
    @include('site.shared.javascript')
    @yield('script')
</body>

</html>
