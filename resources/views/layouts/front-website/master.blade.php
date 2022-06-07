<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="/" />

    <!-- Meta Tag -->
	<meta property="og:type" content="website" />
	<meta property="og:title" content="@yield('og')" />
    <meta name="description" content="Tekenens sebagai jasa Illustrasi dan Desain Karakter yang terpercaya menghasilkan hasil yang terbaik dan maksimal." />
	<meta property="og:description" content="Tekenens sebagai jasa Illustrasi dan Desain Karakter yang terpercaya menghasilkan hasil yang terbaik dan maksimal" />
	<meta property="og:url" content="/" />
	<meta property="og:site_name" content="Tekenens" />
	<meta property="og:image" content="../../assets/images/portfolio/home1.png" />

    <!-- Link CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owlcarousel.css')}}">
    <!-- <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css"> -->
    <title>Tekenens - Design and Illustration Studio</title>
</head>
<body class="m-0 overflow-x-hidden">
    <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="w-100 h-100" width="100%" height="100%"> -->

    <!-- START: Navbar -->
    @include('layouts.front-website.navigation')
    <!-- END: Navbar -->

    @yield('content')

    <!-- START: Footer -->
    @include('layouts.front-website.footer')
    <!-- END: Footer -->
    

    <!-- Javascript -->

   
    <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('assets/js/custom-script.js')}}"></script>
    <script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/js/owlcarousel/owl-custom.js')}}"></script>
</body>
</html>