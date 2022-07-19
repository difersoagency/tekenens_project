<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="/" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5LHHGX5');</script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MJ2W296W9V"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-MJ2W296W9V');
    </script>

    <!-- Meta Tag -->
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $__env->yieldContent('og'); ?>" />
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>" />
	<meta property="og:description" content="<?php echo $__env->yieldContent('description'); ?>" />
	<meta property="og:url" content="/" />
	<meta property="og:site_name" content="Tekenens" />
	<meta property="og:image" content="../../assets/images/portfolio/home1.png" />
    <link rel="icon" href="<?php echo e(asset('assets/images/logo-title.ico')); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo-title.ico')); ?>" type="image/x-icon">
    <!-- Link CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/owlcarousel.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/aos.css')); ?>">
    
    <!-- <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css"> -->
    <title><?php echo $__env->yieldContent('og'); ?></title>
    <?php echo $__env->yieldPushContent('css'); ?>
</head>
<body class="m-0 overflow-x-hidden">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5LHHGX5"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="w-100 h-100" width="100%" height="100%"> -->

    <!-- START: Navbar -->
    <?php echo $__env->make('layouts.front-website.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- END: Navbar -->

    <?php echo $__env->yieldContent('content'); ?>

    <!-- START: Footer -->
    <?php echo $__env->make('layouts.front-website.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- END: Footer -->


    <!-- Javascript -->


    <script src="<?php echo e(asset('assets/js/jquery-3.5.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom-script.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/owlcarousel/owl-custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/animation/aos/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/animation/aos/aos-init.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/isotope.pkgd.js')); ?>"></script>
    <script src="<?php echo e(asset('js/loadash.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap/bootstrap.min.js')); ?>"></script>
   
    <script>
    AOS.init();
    </script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH G:\Diverso\wisnu\resources\views/layouts/front-website/master.blade.php ENDPATH**/ ?>