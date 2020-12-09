<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
    <!-- Fonts -->
{{--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">--}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" type="text/css">
    <link rel="stylesheet" href="{{ asset('layout/tether/tether.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('layout/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('layout/bootstrap/css/bootstrap-grid.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('layout/bootstrap/css/bootstrap-reboot.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('layout/dropdown/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('layout/socicon/css/styles.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('layout/theme/css/style.css') }}" type="text/css">
{{--    <link rel="preload" as="style" href="{{ asset('layout/mobirise/css/mbr-additional.css')}}">--}}
    <link rel="stylesheet" href="{{ asset('layout//mobirise/css/mbr-additional.css') }}" type="text/css">


    <!-- Styles -->
    @livewireStyles
    @yield('styles')
</head>
<section class="menu cid-s48OLK6784" once="menu" id="menu1-h">

    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="{{ route('clientHome') }}">
                        <img src="{{ asset('layout/logo.png') }}"  alt="logo" style="height: 3.8rem; width: 3.7">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-7"
                                                     href="https://mobiri.se"></a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" style="font-size: 14px;"   data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-black font-weight-bold " href="/white-list">
                            Whitelist</a></li>
                    <li class="nav-item"><a class="nav-link link text-black   font-weight-bold " href="/become-supplier">
                            Become a supplier</a></li>
                    <li class="nav-item"><a class="nav-link link text-black   font-weight-bold" href="/contact-us">
                            Contact us</a></li>
                    <li class="nav-item"><a class="nav-link link text-black font-weight-bold " href="{{route('login')}}">
                            Login</a></li>

                </ul>
            </div>
        </div>
    </nav>

</section>

<section class="header1 cid-s48MCQYojq mbr-fullscreen mbr-parallax-background" id="header1-f">
    <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(255, 255, 255);"></div>
    <div class="container">
          @yield('content')
    </div>
</section>

<section class="footer3 cid-s48P1Icc8J" once="footers" id="footer3-i">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    © Copyright 2020 SPMO-BAC OSRS. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</section>
<section
    style="background-color: #fff; display: none!important; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;">
    <a href="https://mobirise.site/v" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a>
 </section>
<script src="{{ asset('layout/web/assets/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('layout/popper/popper.min.js') }}"></script>
{{--<script src="{{ asset('layout//tether/tether.min.js')}}"></script>--}}
<script src="{{ asset('layout//bootstrap/js/bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('layout//smoothscroll/smooth-scroll.js') }}"></script>--}}
{{--<script src="{{ asset('layout//parallax/jarallax.min.js') }}"></script>--}}
<script src="{{ asset('layout//dropdown/js/nav-dropdown.js') }}"></script>
<script src="{{ asset('layout//dropdown/js/navbar-dropdown.js') }}"></script>
<script src="{{ asset('layout//touchswipe/jquery.touch-swipe.min.js') }}"></script>
<script src="{{ asset('layout//theme/js/script.js') }}"></script>
@yield('scripts')
@livewireScripts
</body>
</html>
