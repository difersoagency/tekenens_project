
<?php $__env->startSection('og','Jasa Desain Karakter di Indonesia'); ?>
<?php $__env->startSection('description','Tekenens merupakan pilihan terbaik untuk Anda yang membutuhkan Jasa Desain Karakter di Indonesia'); ?>

<?php $__env->startSection('content'); ?>
<!-- START: Banner -->
<section class="banner-images position-relative">
        <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="" width="100%" height="600px"> -->
        <div class="banner-parallax"></div>
        <div class="overlay text-center my-auto align-middle position-absolute"></div>
        <div class="title-page" >
            <h1 class="align-middle font-bold" data-aos="fade-down" data-aos-delay="500" data-aos-duration="1000">ABOUT<span class="text-white"> TEKENENS</span></h1>
            <p class="text-white" data-aos="fade-down" data-aos-delay="700" data-aos-duration="1000"><?php if(isset($about)): ?><?php echo $about->page->meta_desc; ?><?php endif; ?></p>
        </div>
        <!-- <img src="../../assets/images/banner-all.png" alt="Tentang Tekenens Studio" width="100%"> -->
</section>
<!-- END: Banner -->

<!-- START: About Tekenens -->
<section class="container about-sect px-5">
    <div class="row justify-around align-items-center">
        <?php if(isset($about)): ?>
        <div class="col-12 col-md-6 col-lg-5" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
            <h2 class="text-gray font-bold">
                All in <span class="text-green">One</span>
            </h2>
            <span class="text-green font-semibold">Illustration, Character Design, Realistic Drawing</span>
            <p>
            <?php echo $about->description; ?>

            </p>
        </div>
        <div class="col-12 col-md-6">
            <?php if(isset($about)): ?>
            <img src="<?php echo e(asset('storage/images/about/'.$about->page->media)); ?>" alt="" width="100%"  data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- END: About Tekenens -->

<!-- START : Meet Our Team -->
<section class="container px-5 our-team mb-5">
    <h2 class="text-gray font-bold" data-aos="fade-bottom">MEET OUR <span class="text-green">TEAM</span></h2>
    <div class="row team-member justify-between mt-5">
        <?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-6 col-md-3 member mb-4 position-relative" data-aos="flip-right">
            <div class="overlay-team text-center">
                <h3 class="text-white font-bold"><?php echo e($t->name); ?></h3>
                <p class="text-white"><?php echo e($t->role); ?></p>
            </div>
            <img src="<?php echo e(asset('storage/'.$t->photo)); ?>" alt="Team Tekenens" width="90%" height="auto" style="border-radius: 15px;">
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
    </div>
</section>
<!-- END : Meet Our Team -->

<!-- START : Collaborate Section -->

<section class="container px-5 collaborate" data-aos="fade-up">
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