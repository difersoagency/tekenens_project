
    @extends('layouts.front-website.master')
    @section('og','Tekenens - Jasa Illustrasi dan Desain Karakter')
    @section('content')
    <!-- START: Banner -->
    <section class="banner"> 
        <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="" width="100%" height="600px"> -->
        <div class="overlay-gradient"></div>
        <div class="overlay"></div>
        <video src="../../assets/video/banner-vid.mp4" width="100%" autoplay muted loop></video>
    </section>
    <!-- END: Banner -->

    <!-- START: Pattern -->
    <img src="../../assets/images/pattern.png" alt="Pattern" class="bg-pattern" width="100%" height="100%">
    <!-- END: Pattern -->

    <!-- START: Section Introduction -->
    <section class="mt-5 container px-5 px-md-3 px-lg-5 intro">
        <div class="row">
            <div class="text-center col-12 col-md-6">
                <img src="../../assets/images/circle1.png" alt="Loading Banner" class="floating-long position-absolute c3" width="55px" height="auto">
                <img src="../../assets/images/circle1.png" alt="Loading Banner" class="floating-short position-absolute c1" width="66px" height="auto">
                <img src="../../assets/images/circle1.png" alt="Loading Banner" class="floating-upside position-absolute c2" width="44px" height="auto">
                <img src="../../assets/images/karakter-home.png" alt="Desain Karakter Tekenens" width="60%" height="auto">
            </div>
            <div class="col">
                <p class="text-gray font-weight-bold font-medium font-semibold">Hello!</p>
                <h1 class="text-gray font-bold">
                WELCOME TO <br><span class="text-green">TEKENENS WORLD!<span>
                </h1>
                <p class="text-justify mb-4">
                Tekenens is an illustration and character design service for professional and experienced artists to produce the best quality images. And also Can create illustrations with various themes and genres for various needs, Learn more about Tekenens and prepare to be amazed by the results of the drawings from the artists at Tekenens     
                </p>
                <button>
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
        <h2 class="font-bold heading2">OUR <span>PORTFOLIO</span></h2>
        <div class="row">
            <div class="col-12 col-md-7 position-relative pr-0 mb-4">
                <img src="../../assets/images/portfolio/home1.png" alt="Portfolio Illustration Tekenens" width="100%" height="385px">
                <div class="overlay-porto px-4 text-white">
                    <h3>Nama Project</h3>
                    <p>Client Name (Year)</p>
                </div>
            </div>
            <div class="col-12 col-md-5 position-relative pr-0 mb-4">
                <img src="../../assets/images/portfolio/home2.png" alt="Portfolio Illustration Tekenens" width="100%" height="385px">
                <div class="overlay-porto px-4 text-white">
                    <h3>Nama Project</h3>
                    <p>Client Name (Year)</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 position-relative pr-0 mb-4">
                <img src="../../assets/images/portfolio/home3.jpg" alt="Portfolio Illustration Tekenens" width="100%" height="385px">
                <div class="overlay-porto px-4 text-white">
                    <h3>Nama Project</h3>
                    <p>Client Name (Year)</p>
                </div>
            </div>
            <div class="col-12 col-md-6 position-relative pr-0 mb-4">
                <img src="../../assets/images/portfolio/home4.jpg" alt="Portfolio Illustration Tekenens" width="100%" height="385px">
                <div class="overlay-porto px-4 text-white">
                    <h3>Nama Project</h3>
                    <p>Client Name (Year)</p>
                </div>
            </div>
        </div>
        <div class="row button-port">
            <div class="col">
                <button>
                    <div class="circle"></div>
                    <div class="oval">
                        <p class="font-semibold">MORE PORTFOLIO</p>
                    </div>
                </button>
            </div>
        </div>
    </section>
    <!-- END: Section Portfolio -->

    <!-- START: Section Testimoni -->
    <section class="container px-5 testimoni-sect">
        <h2 class="font-bold text-gray">WHAT OUR <span class="text-green"> CLIENT SAY.. </span></h2>
        <div class="row px-2 h-96">
            <div class="col text-center owl-carousel">
                <div>
                    <img src="../../assets/images/ava-testi.png" alt="Avatar Testimoni" width="95px" height="95px" class="m-auto">
                    <p class="text-yellow testimoni-content mt-2 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam est, at libero odio adipiscing vitae varius diam pretium. Eu, fames id erat amet elementum imperdiet. Sociis urna morbi odio aliquet viverra felis massa.</p>
                    <p class="text-yellow mt-2 text-sm testimoni-name">Testimon-1</p>
                </div>
                <div>
                    <img src="../../assets/images/ava-testi.png" alt="Avatar Testimoni" width="95px" height="95px" class="m-auto">
                    <p class="text-yellow testimoni-content mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam est, at libero odio adipiscing vitae varius diam pretium. Eu, fames id erat amet elementum imperdiet. Sociis urna morbi odio aliquet viverra felis massa.</p>
                    <p class="text-yellow mt-2 text-sm testimoni-name">Testimoni-2</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END: Section Testimoni -->
    @endsection