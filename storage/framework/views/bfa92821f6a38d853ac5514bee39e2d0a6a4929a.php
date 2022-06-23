
<?php $__env->startSection('og','Tekenens - Jasa Illustrasi dan Desain Karakter'); ?>

<?php $__env->startSection('content'); ?>
<!-- START: Banner -->
<section class="banner-images position-relative">
        <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="" width="100%" height="600px"> -->
        <div class="banner-parallax"></div>
        <div class="overlay text-center my-auto align-middle position-absolute"></div>
        <div class="title-page">
            <h1 class="align-middle font-bold">ABOUT<span class="text-white"> US.</span></h1>
            <p class="text-white">Find out more about Tekenens Studio <br> and the great people in it</p>
        </div>
        <!-- <img src="../../assets/images/banner-all.png" alt="Tentang Tekenens Studio" width="100%"> -->
</section>
<!-- END: Banner -->

<!-- START: About Tekenens -->
<section class="container about-sect px-5">
    <div class="row justify-around align-items-center">
        <div class="col-12 col-md-6 col-lg-5">
            <h2 class="text-gray font-bold">
                All in <span class="text-green">One</span>
            </h2>
            <span class="text-green font-semibold">Illustration, Character Design, Realistic Drawing</span>
            <p>
            <?php echo e($about->meta_desc); ?>

            </p>
        </div>
        <div class="col-12 col-md-6">
            <img src="<?php echo e(asset('storage/images/about/'.$about->media)); ?>" alt="" width="100%">
        </div>
    </div>
</section>
<!-- END: About Tekenens -->

<!-- START : Meet Our Team -->
<section class="container px-5 our-team mb-5">
    <h2 class="text-gray font-bold">MEET OUR <span class="text-green">TEAM</span></h2>
    <div class="row team-member justify-between mt-5">
        <?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-6 col-md-3 member mb-4 position-relative">
            <div class="overlay-team text-center">
                <h3 class="text-white font-bold"><?php echo e($t->name); ?></h3>
                <p class="text-white"><?php echo e($t->role); ?></p>
            </div>
            <img src="<?php echo e(asset('storage/'.$t->photo)); ?>" alt="Team Tekenens" width="90%" height="auto">
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
    </div>
</section>
<!-- END : Meet Our Team -->

<!-- START : Collaborate Section -->

<section class="container px-5 collaborate">
    <div class="section-green text-center">
        <h3 class="text-white font-bold">LET'S COLLABORATE</h3>
        <a href="" class="link-collab">
            <div class="button-collab">
                <p class="text-green font-bold">Get Started Now!</p>
            </div>
        </a>
    </div>
</section>

<!-- END : Collaborate Section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tekenens_project\resources\views/pages/about.blade.php ENDPATH**/ ?>