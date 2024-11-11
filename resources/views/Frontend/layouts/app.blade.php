<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mon Bon Vin| e-commerce">
    <meta name="keywords" content="Mon Bon Vin| e-commerce">
    <meta name="author" content="Mon Bon Vin| e-commerce">
    <link rel="icon" href="{{ asset('../Backend/dist/img/Jiam_s4-removebg-preview.png') }}" type="image/x-icon">
    <title>Mon Bon Vin| @yield('title')</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('../Frontend/assets/css/vendors/bootstrap.css') }}">

    <!-- wow css -->
    <link rel="stylesheet" href="{{ asset('../Frontend/assets/css/animate.min.css') }}" />

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('../Frontend/assets/css/vendors/font-awesome.css') }}">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('../Frontend/assets/css/vendors/feather-icon.css') }}">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('../Frontend/assets/css/vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../Frontend/assets/css/vendors/slick/slick-theme.css') }}">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('../Frontend/assets/css/bulk-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('../Frontend/assets/css/vendors/animate.css') }}">

    @livewireStyles
    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('../Frontend/assets/css/style.css') }}">


</head>

<body class="theme-color-5">

    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->

    @include('../Frontend/partials/navbar')

    @yield('content')

    @include('../Frontend/partials/footer')



    @livewireScripts
 <!-- Bg overlay Start -->

    <!-- Bg overlay End -->

    <!-- latest jquery-->
    <script src="{{ asset('../Frontend/assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- jquery ui-->
    <script src="{{ asset('../Frontend/assets/js/jquery-ui.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('../Frontend/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('../Frontend/assets/js/bootstrap/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('../Frontend/assets/js/mes-notif.js') }}"></script>
    <script src="{{ asset('../Frontend/assets/js/bootstrap/popper.min.js') }}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('../Frontend/assets/js/feather/feather.min.js') }}"></script>
    <script src="{{ asset('../Frontend/assets/js/feather/feather-icon.js') }}"></script>

    <!-- Lazyload Js -->
    <script src="{{ asset('../Frontend/assets/js/lazysizes.min.js') }}"></script>

    <!-- Slick js-->
    <script src="{{ asset('../Frontend/assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('../Frontend/assets/js/slick/slick-animation.min.js') }}"></script>
    <script src="{{ asset('../Frontend/assets/js/slick/custom_slick.js') }}"></script>

    <!-- Auto Height Js -->
    <script src="{{ asset('../Frontend/assets/js/auto-height.js') }}"></script>

    <script src="{{ asset('../Frontend/assets/js/ion.rangeSlider.min.js') }}"></script>

    <script src="{{ asset('../Frontend/assets/js/filter-sidebar.js') }}"></script>


    <!-- Timer Js -->
    <script src="{{ asset('../Frontend/assets/js/timer1.js') }}"></script>

    <!-- Quantity js -->
    <script src="{{ asset('../Frontend/assets/js/quantity-2.js') }}"></script>
    <script src="{{ asset('../Frontend/assets/js/quantity.js') }}"></script>

    <!-- WOW js -->
    <script src="{{ asset('../Frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('../Frontend/assets/js/custom-wow.js') }}"></script>

    <!-- script js -->
    <script src="{{ asset('../Frontend/assets/js/script.js') }}"></script>

    <!-- thme setting js -->
    <script src="{{ asset('../Frontend/assets/js/theme-setting.js') }}"></script>
</body>

</html>
