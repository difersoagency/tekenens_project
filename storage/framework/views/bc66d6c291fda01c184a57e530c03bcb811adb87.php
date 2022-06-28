
    
    <?php $__env->startSection('og','Tekenens - Jasa Illustrasi dan Desain Karakter'); ?>
    <?php $__env->startPush('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/aos.css')); ?>">
    <?php $__env->stopPush(); ?>
    <?php $__env->startSection('content'); ?>
    <!-- START: Banner -->
    <section class="banner">
        <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="" width="100%" height="600px"> -->
        <div class="overlay-gradient"></div>
        <div class="overlay"></div>
        <video src="<?php echo e(asset('storage/images/home/'.$home->media)); ?>" width="100%" autoplay muted loop></video>
    </section>
    <!-- END: Banner -->

    <!-- START: Pattern -->
    <img src="../../assets/images/pattern.png" alt="Pattern" class="bg-pattern" width="100%" height="100%">
    <!-- END: Pattern -->

    <!-- START: Section Introduction -->
    <section class="mt-5 container px-5 px-md-3 px-lg-5 intro">
        <div class="row">
            <div class="text-center col-12 col-md-6"  data-aos="fade-up">
                <img src="../../assets/images/circle1.png" alt="Loading Banner" class="floating-long position-absolute c3" width="55px" height="auto">
                <img src="../../assets/images/circle1.png" alt="Loading Banner" class="floating-short position-absolute c1" width="66px" height="auto">
                <img src="../../assets/images/circle1.png" alt="Loading Banner" class="floating-upside position-absolute c2" width="44px" height="auto">
                <img src="../../assets/images/karakter-home.png" alt="Desain Karakter Tekenens" width="60%" height="auto">
            </div>
            <div class="col" data-aos="fade-down">
                <p class="text-gray font-weight-bold font-medium font-semibold">Hello!</p>
                <h1 class="text-gray font-bold">
                WELCOME TO <br><span class="text-green">TEKENENS WORLD!<span>
                </h1>
                <p class="text-justify mb-4">
                Tekenens is an illustration and character design service for professional and experienced artists to produce the best quality images. And also Can create illustrations with various themes and genres for various needs, Learn more about Tekenens and prepare to be amazed by the results of the drawings from the artists at Tekenens
                </p>
                <button class="button-all">
                    <div class="circle"></div>
                    <div class="oval">
                        <p class="font-semibold">LEARN MORE</p>
                    </div>
                </button>
            </div>
        </div>
    </section>
    <!-- END: Section Introduction -->

    <!-- START: Section Portfolio -->
    <section class="container px-5 portfolio-sect">
        <h2 class="font-bold heading2" data-aos="fade-right">OUR <span>PORTOFOLIO</span></h2>
        <?php $c = 0;?>
        <?php $__empty_1 = true; $__currentLoopData = $portofolio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if($c % 2 == 0): ?>
        <div class="row"  data-aos="flip-left">
        <?php endif; ?>
        <div class="col-12 col-md-6 position-relative pr-0 mb-4" data-aos="zoom-in">
            <img src="<?php echo e(asset('storage/images/portofolio/'.$p->id.'/'.$p->DetailPortofolio->first()->media)); ?>" alt="<?php echo e($p->DetailPortofolio->first()->title); ?>" width="100%" height="385px">
            <div class="overlay-porto px-4 text-white">
                <h3><?php echo e($p->title); ?> <?php echo e($c % 2); ?></h3>
                <p>Client Name (Year)</p>
            </div>
        </div>
        <?php if($c % 2 == 1): ?>
        </div>
        <?php endif; ?>
        <?php $c++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>

        <div class="row button-port">
            <div class="col">
                <button class="button-all">
                    <div class="circle"></div>
                    <div class="oval">
                        <p class="font-semibold">MORE PORTFOLIO</p>
                    </div>
                </button>
            </div>
    </section>
    <!-- END: Section Portfolio -->

    <!-- START: Section Testimoni -->
    <section class="container px-5 testimoni-sect">
        <h2 class="font-bold text-gray" data-aos="fade-up">WHAT OUR <span class="text-green"> CLIENT SAY.. </span></h2>
        <div class="row px-2 h-96"  data-aos="fade-up" data-aos-anchor-placement="bottom-center">
            <div class="col text-center owl-carousel">
            <?php $__currentLoopData = $testimoni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <img src="<?php echo e(asset('storage/'.$t->photo)); ?>" alt="Avatar Testimoni" width="95px" height="95px" class="m-auto rounded-circle">
                    <p class="text-yellow testimoni-content mt-2 text-sm"> <?php echo Str::words($t->description, 20, ' ...'); ?></p>
                    <p class="text-yellow mt-2 text-sm testimoni-name"><?php echo e($t->name); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!-- END: Section Testimoni -->
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/animation/aos/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/animation/aos/aos-init.js')); ?>"></script>
    <script>
    AOS.init();
    </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tekenens_project\resources\views/pages/main.blade.php ENDPATH**/ ?>