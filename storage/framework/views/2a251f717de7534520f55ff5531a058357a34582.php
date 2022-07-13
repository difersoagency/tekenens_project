
<?php $__env->startSection('og','Tekenens - Jasa Illustrasi dan Desain Karakter'); ?>
<?php $__env->startSection('content'); ?>

 <!-- START: Banner -->
    <section class="banner-images position-relative">
        <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="" width="100%" height="600px"> -->
        <div class="banner-parallax"></div>
        <div class="overlay text-center my-auto align-middle position-absolute"></div>
        <div class="title-page container px-5">
            <h1 class="align-middle font-bold">CONTACT<span class="text-white"> US</span></h1>
            <p class="text-white ">Contact us to work with us to produce great results for your image needs. Discuss with us what you need and we will provide several solutions to meet your needs. </p>
        </div>
        <!-- <img src="../../assets/images/banner-all.png" alt="Tentang Tekenens Studio" width="100%"> -->
    </section>
    <!-- END: Banner -->

    <!-- START: Contact Form -->
    <section class="row mx-0 mx-md-5 align-items-center">
        <div class="col contact-form container px-4 px-md-5 mt-5 mb-5">
            <p class="font-bold get-touch">GET in TOUCH !</p>
            <h2 class="title-form text-green font-bold">SCHEDULE <span class="text-gray">an MEETING</span></h2>
            <form method="POST" action="<?php echo e(route('send_mail')); ?>">
                <?php echo csrf_field(); ?>
            <div class="form mt-5 mb-5">
                <!-- <p>Hello, My Name Is <input type="text" name="nama_klien" id="nama-klien" class="field-nama" placeholder="Your Name" required> and i'm looking for <input type="text" name="nama-klien" id="nama-klien" class="field-nama" placeholder="Tekenens Service" required> Get in touch with me at <input type="email" name="email_klien" id="email-klien" class="field-nama" placeholder="Your Email" required>. Tell us specifically what you need in the message column here <br><textarea name="messages" id="pesan-klien" class="field-pesan" placeholder="Leave Your Messages" rows="3" cols="5" required></textarea></p> -->
                <div class="row gap-2">
                    <div class="col-5">
                        <label for="first-name"  class="mb-3">
                        First Name
                        </label>
                        <br>
                        <input type="text" name="first-name" id="first-name" required class="w-100">
                    </div>
                    <div class="col-5">
                        <label for="last-name" required class="mb-3">
                        Last Name
                        </label>
                        <br>
                        <input type="text" name="last-name" id="last-name" class="w-100">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-10">
                        <label for="email" class="mb-3">
                            Email
                        </label>
                        <br>
                        <input type="email" name="email" id="email" class="w-100">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-10">
                        <label for="messages" class="mb-3">
                            Messages
                        </label>
                        <br>
                        <textarea name="messages" id="pesan-klien" class="field-pesan" rows="2" cols="5" required></textarea>
                    </div>
                </div>
            </div>
            <button class="button-all mb-5" type="submit">
                <div class="circle"></div>
                <div class="oval">
                    <p class="font-semibold">SEND MESSAGES</p>
                </div>
            </button>
            </form>
            <div class="socmed-contact row">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-lg-8">
                    <div class="row gx-2 gy-4">
                    <a href="/home" target="_blank" class="col text-center text-md-start">
                    <div class="item-socmed">
                        <img src="../../assets/images/socmed-ig.png" alt="" width="30" height="30">
                        <span><?php echo e($d->instagram); ?></span>
                    </div>
                </a>
                <a href="/contact" target="_blank" class="col text-center text-md-start">
                    <div class="item-socmed">
                        <img src="../../assets/images/socmed-wa.png" alt="" width="30" height="30">
                        <span><?php echo e($d->whatsapp); ?></span>
                    </div>
                </a>
                <a href="/about" target="_blank" class="col text-center text-md-start">
                    <div class="item-socmed">
                        <img src="../../assets/images/socmed-mail.png" alt="" width="30" height="30">
                        <span><?php echo e($d->email); ?></span>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
                    </div>
            </div>
        </div>
        <div class="col mt-5 mb-5 d-none d-md-block">
            <img src="../../assets/images/contact-img2.jpg" alt="Team Tekenens" width="90%" height="auto">
        </div>
    </section>
    <!-- END: Contact Form -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Diverso\wisnu\resources\views/pages/contact.blade.php ENDPATH**/ ?>