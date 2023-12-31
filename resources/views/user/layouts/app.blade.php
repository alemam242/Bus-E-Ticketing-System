<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Store-Keeper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <!-- jsvectormap css -->
    <link href="{{ asset('assets/lib') }}/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('assets/lib') }}/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js') }}/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css') }}/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css') }}/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css') }}/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css') }}/custom.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

        {{-- Header Attached Here --}}
        @include('user.components.header')


        {{-- Navbar Attached Here --}}
        @include('user.components.navbar')


        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>


        {{-- Content Attached Here --}}
        @yield('content')


    </div>
    <!-- END layout-wrapper -->

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->



    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/lib') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib') }}/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('assets/lib') }}/node-waves/waves.min.js"></script>
    <script src="{{ asset('assets/lib') }}/feather-icons/feather.min.js"></script>
    <script src="{{ asset('assets/js') }}/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{ asset('assets/js') }}/plugins.js"></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets/lib') }}/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/lib') }}/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="{{ asset('assets/lib') }}/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('assets/lib') }}/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets/js') }}/pages/dashboard-ecommerce.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js') }}/app.js"></script>
</body>

</html>
