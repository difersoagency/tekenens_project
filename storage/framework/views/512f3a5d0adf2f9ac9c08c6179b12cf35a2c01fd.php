    <div class="overlay-loading d-none">

    </div>
<header class="mt-5 container px-5 position-absolute start-50 translate-middle navigation  overlay-navbar">

        <div class="navigation-top row algin-center menu">
            <div class="col">
                <a href="/">
                    <img src="../../assets/images/logo-white.png" alt="Logo Tekenens" class="logo-nav" width="100%" height="100%">
                </a>
            </div>
            <div class="col row d-none d-xl-flex align-content-center">
                <div class="col text-center  <?php echo e(request()->is('/') ? '' : 'nav-text'); ?> position-relative ">
                    <a href="/" class="text-white text-decoration-none">Home</a>
                    <span class="underline position-absolute start-50 translate-middle"  style="<?php echo e(request()->is('/') ? 'margin-top:-25px;' : ''); ?>"></span>
                </div>
                <div class="col text-center <?php echo e(request()->is('about') ? '' : 'nav-text'); ?> position-relative ">
                    <a href="/about" class="text-white text-decoration-none">About</a>
                    <span class="underline position-absolute start-50 translate-middle" style="<?php echo e(request()->is('about') ? 'margin-top:-25px;' : ''); ?>"></span>
                </div>
                <div class="col text-center <?php echo e(Request::segment(1) === 'portfolio' ? '' : 'nav-text'); ?>  position-relative ">
                    <a href="/portfolio" class="text-white text-decoration-none">Portfolio</a>
                    <span class="underline position-absolute start-50 translate-middle" style="<?php echo e(Request::segment(1) === 'portfolio' ? 'margin-top:-25px;' : ''); ?>"></span>
                </div>
                <div class="col text-center <?php echo e(request()->is('contact') ? '' : 'nav-text'); ?> position-relative ">
                    <a href="/contact" class="text-white text-decoration-none">Contact</a>
                    <span class="underline position-absolute start-50 translate-middle"style="<?php echo e(request()->is('contact') ? 'margin-top:-25px;' : ''); ?>" ></span>
                </div>
                <!-- <div class="col text-center nav-text position-relative ">
                    <a href="" class="text-white text-decoration-none">Blog</a>
                    <span class="underline position-absolute start-50 translate-middle"></span>
                </div> -->
            </div>
            <div class="col d-xl-none text-end align-self-center">
                <div class="col hamburger">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>
        </div>
    </header>

    <section class="mobile-nav">
         <div class="col text-center  <?php echo e(request()->is('/') ? '' : 'nav-text'); ?> position-relative ">
                    <a href="/" class="text-white text-decoration-none">Home</a>
                    <span class="underline position-absolute start-50 translate-middle"  style="<?php echo e(request()->is('/') ? 'background-color:#38AF88;' : ''); ?>"></span>
                </div>
                <div class="col text-center <?php echo e(request()->is('about') ? '' : 'nav-text'); ?> position-relative ">
                    <a href="/about" class="text-white text-decoration-none">About</a>
                    <span class="underline position-absolute start-50 translate-middle" style="<?php echo e(request()->is('about') ? 'background-color:#38AF88;' : ''); ?>"></span>
                </div>
                <div class="col text-center <?php echo e(request()->is('portfolio') ? '' : 'nav-text'); ?>  position-relative ">
                    <a href="/portfolio" class="text-white text-decoration-none">Portfolio</a>
                    <span class="underline position-absolute start-50 translate-middle" style="<?php echo e(request()->is('portfolio') ? 'background-color:#38AF88;' : ''); ?>"></span>
                </div>
                <div class="col text-center nav-text position-relative ">
                    <a href="/contact" class="text-white text-decoration-none">Contact</a>
                    <span class="underline position-absolute start-50 translate-middle"style="<?php echo e(request()->is('contact') ? 'background-color:#38AF88;' : ''); ?>" ></span>
                </div>
    </section>

<?php /**PATH G:\Diverso\wisnu\resources\views/layouts/front-website/navigation.blade.php ENDPATH**/ ?>