
    @extends('layouts.front-website.master')
    @section('og','Tekenens - Jasa Illustrasi dan Desain Karakter')

    @section('content')
    <!-- START: Banner -->
    <section class="banner">
        <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="" width="100%" height="600px"> -->
        <!-- <div class="overlay-gradient"></div> -->
        <div class="overlay-detail"></div>
    </section>
    <!-- END: Banner -->

    <!-- START: Pattern -->
    <img src="../../assets/images/pattern.png" alt="Pattern" class="bg-pattern-detail" width="100%" height="100%">
    <!-- END: Pattern -->

    <!-- START: Section Introduction -->
    <section class="mt-5 mb-5 container px-5 px-md-3 px-lg-5 detail-sect">
        <div class="text-center">
            <div class="row">
                <a href="" class="col back">
                    <!-- <div class=""> -->
                        <img src="../../assets/images/back-ico.png" alt="Back Portfolio" width="10%" height="auto">
                    <!-- </div> -->
                </a>
                <div class="col text-center">
                    <h1 class="text-gray name-proj">Project Name</h1>
                    <p class="text-green year-proj">(Year)</p>
                </div>
                <a href="" class="col close">
                    
                        <img src="../../assets/images/close-ico.png" alt="Back Portfolio" width="10%" height="auto">
                    
                </a>
            </div>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Neque odio lorem ut metus a sem nibh. Sit ultricies tristique amet at sem. Blandit orci cursus vitae diam et at tempor. Sollicitudin eget libero a ornare semper at. Vel nunc tellus egestas pellentesque. Euismod venenatis dictum quis rhoncus nullam venenatis. </p>
            <img src="../../assets/images/about1.jpg" alt="Back Portfolio" width="100%" height="auto" class="rounded">
            <h2 class="status-proj">Draft / Sketch / Final Result</h2>
        </div>
    </section>
    <!-- END: Section Introduction -->
    <section class="margin-to-bot"></section>
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


    @endsection

