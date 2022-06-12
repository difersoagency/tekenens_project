
<?php $__env->startSection('og','Tekenens - Jasa Illustrasi dan Desain Karakter'); ?>
<?php $__env->startSection('content'); ?>

 <!-- START: Banner -->
    <section class="banner-images position-relative"> 
        <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="" width="100%" height="600px"> -->
        <div class="banner-parallax"></div>
        <div class="overlay text-center my-auto align-middle position-absolute"></div>
        <div class="title-page container px-5">
            <h1 class="align-middle font-bold">CONTACT<span class="text-white"> US</span></h1>
            <p class="text-white ">Contact us to work with us to produce great results for your image needs. Discuss with us what you need and we will provide several solutions to meet your needs</p>
        </div>
        <!-- <img src="../../assets/images/banner-all.png" alt="Tentang Tekenens Studio" width="100%"> -->
    </section>
    <!-- END: Banner -->

    <!-- START: Contact Form -->
    <section class="contact-form container px-5 mt-5 mb-5">
        <p class="font-bold get-touch">GET in TOUCH !</p>
        <h2 class="title-form text-green font-bold">SCHEDULE <span class="text-gray">an MEETING</span></h2>
        <div class="form mt-5">
            <p>Halo Nama Saya <input type="text" name="nama-klien" id="nama-klien" class="field-nama" placeholder="Name" required> Saya Ingin</p>
        </div>
    </section>
    <!-- END: Contact Form -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front-website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project\tekenenss\tekenens_project\resources\views/pages/contact.blade.php ENDPATH**/ ?>