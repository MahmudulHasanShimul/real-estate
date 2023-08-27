<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>@yield('title')</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{asset('/')}}website/assets/images/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    @include('website.includes.style')

</head>
<!-- page wrapper -->
<body>

    <div class="boxed_wrapper">
        <!-- preloader -->
        {{-- <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close"><i class="far fa-times"></i></div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="l" class="letters-loading">
                                l
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="h" class="letters-loading">
                                h
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="d" class="letters-loading">
                                d
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- preloader end -->

        <!-- main header -->
        @include('website.includes.header')
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        @include('website.includes.mobile-menu')
        <!-- End Mobile Menu -->

        @yield('page-content')

       @include('website.includes.footer')

        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>

    <!-- jequery plugins -->
    @include('website.includes.script')

</body><!-- End of .page_wrapper -->

<!-- Mirrored from azim.commonsupport.com/Realshed/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Aug 2023 19:17:05 GMT -->

</html>
