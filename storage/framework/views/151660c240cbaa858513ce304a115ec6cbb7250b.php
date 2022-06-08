    
    <?php $__env->startSection('og','Tekenens - Jasa Illustrasi dan Desain Karakter'); ?>
    <?php $__env->startSection('content'); ?>

    <!-- START: Banner -->
    <section class="banner-images position-relative"> 
        <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="" width="100%" height="600px"> -->
        <div class="banner-parallax"></div>
        <div class="overlay text-center my-auto align-middle position-absolute"></div>
        <div class="title-page container px-5">
            <h1 class="align-middle font-bold">OUR<span class="text-white"> PORTFOLIO</span></h1>
            <p class="text-white ">The results of the work of Tekenens Studio produced by talented artists and provide maximum results in each of their works</p>
        </div>
        <!-- <img src="../../assets/images/banner-all.png" alt="Tentang Tekenens Studio" width="100%"> -->
    </section>
    <!-- END: Banner -->

    <!-- START: Section Portfolio -->
    <section class="portfolio-archive my-5">
        <div class="container px-5 text-center">
            <p>Masterpieces from Artists in Tekenens Studio with all categories, see the best work from our Artists and we are waiting for your project to become one of our best works too</p>
        </div>
        <div class="category-text mt-4 px-5 row mx-auto">
            <div class="col-6 col-md-2 text-center font-semibold">
                <a href="">All</a>
            </div>
            <div class="col-6 col-md-2 text-center font-semibold">
                <a href="">Icon</a>
            </div>
            <div class="col-6 col-md-2 text-center font-semibold">
                <a href="">Anime</a>
            </div>
            <div class="col-6 col-md-2 text-center font-semibold">
                <a href="">Background</a>
            </div>
        </div>
        <div class="layout-portfolio row mt-5 px-5 container mx-auto gap-md-1">
            <div class="col-5 col-md-3 karya mb-4 position-relative">
                <div class="overlay-porto text-center">
                    <h3 class="text-white font-bold">Nama Karya</h3>
                    <p class="text-white">Client Name (year)</p>
                </div>
                <img src="../../assets/images/placeholder-image.jpg" alt="Team Tekenens" width="100%" height="auto">
            </div>
            <div class="col-5 col-md-3 karya mb-4 position-relative">
                <div class="overlay-porto text-center">
                    <h3 class="text-white font-bold">Nama Karya</h3>
                    <p class="text-white">Client Name (year)</p>
                </div>
                <img src="../../assets/images/placeholder-image.jpg" alt="Team Tekenens" width="100%" height="auto">
            </div>
            <div class="col-5 col-md-3 karya mb-4 position-relative">
                <div class="overlay-porto text-center">
                    <h3 class="text-white font-bold">Nama Karya</h3>
                    <p class="text-white">Client Name (year)</p>
                </div>
                <img src="../../assets/images/placeholder-image.jpg" alt="Team Tekenens" width="100%" height="auto">
            </div>
            <div class="col-5 col-md-3 karya mb-4 position-relative">
                <div class="overlay-porto text-center">
                    <h3 class="text-white font-bold">Nama Karya</h3>
                    <p class="text-whzte">Client Name (year)</p>
                </div>
                <img src="../../assets/images/placeholder-image.jpg" alt="Team Tekenens" width="100%" height="auto">
            </div>
           
        </div>
    </section>
    <!-- END: Section Portfolio -->

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front-website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\tekenenss\tekenens_project\resources\views/pages/portfolio.blade.php ENDPATH**/ ?>