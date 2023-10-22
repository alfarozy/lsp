<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/FlexStart/assets/img/favicon.png" rel="icon">
    <link href="/FlexStart/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/FlexStart/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/FlexStart/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/FlexStart/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/FlexStart/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/FlexStart/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/FlexStart/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/FlexStart/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    @include('layouts.frontoffice.nav')

    @yield('content')

    @include('layouts.frontoffice.footer')

    <!-- Vendor JS Files -->
    <script src="/FlexStart/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/FlexStart/assets/vendor/aos/aos.js"></script>
    <script src="/FlexStart/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/FlexStart/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/FlexStart/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/FlexStart/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/FlexStart/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/FlexStart/assets/js/main.js"></script>

</body>

</html>
