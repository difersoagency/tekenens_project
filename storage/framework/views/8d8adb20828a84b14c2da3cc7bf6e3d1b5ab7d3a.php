<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="/" />

    <!-- Meta Tag -->
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $__env->yieldContent('og'); ?>" />
    <meta name="description" content="Tekenens sebagai jasa Illustrasi dan Desain Karakter yang terpercaya menghasilkan hasil yang terbaik dan maksimal." />
	<meta property="og:description" content="Tekenens sebagai jasa Illustrasi dan Desain Karakter yang terpercaya menghasilkan hasil yang terbaik dan maksimal" />
	<meta property="og:url" content="/" />
	<meta property="og:site_name" content="Tekenens" />
	<meta property="og:image" content="../../assets/images/portfolio/home1.png" />

    <!-- Link CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/owlcarousel.css')); ?>">
    
    <!-- <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css"> -->
    <title>Tekenens - Design and Illustration Studio</title>
    <?php echo $__env->yieldPushContent('css'); ?>
</head>
<body class="m-0 overflow-x-hidden">
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
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH E:\tekenens_project\resources\views/layouts/front-website/master.blade.php ENDPATH**/ ?>