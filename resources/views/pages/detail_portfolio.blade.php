
    @extends('layouts.front-website.master')
    @section('og','Tekenens - Jasa Illustrasi dan Desain Karakter')

    @section('content')
    <!-- START: Banner -->
    <section class="banner-porto">
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
                <a href="/portfolio" class="col back">
                    <!-- <div class=""> -->
                        <img src="../../assets/images/back-ico.png" alt="Back Portfolio" width="10%" height="auto">
                    <!-- </div> -->
                </a>
                <div class="col text-center">
                    <h1 class="text-gray name-proj">{{$data->Portofolio->title}}</h1>
                    <p class="text-green year-proj">({{ date('Y', strtotime($data->Portofolio->publish_date)) }})</p>
                </div>
                <a href="/" class="col close">

                        <img src="../../assets/images/close-ico.png" alt="Back Portfolio" width="10%" height="auto">

                </a>
            </div>
            <p class="mb-5">{{$data->Portofolio->description}}</p>
            <img src="{{asset('storage/images/portofolio/'.'/'.$data->portofolio_id.'/'.$data->media)}}" alt="Back Portfolio" width="100%" height="auto" class="rounded">
            <h2 class="status-proj">Draft / Sketch / Final Result</h2>
        </div>
        <div class="section-green text-center">
        <h3 class="text-white font-bold">LET'S COLLABORATE</h3>
        <a href="" class="link-collab">
            <div class="button-collab">
                <p class="text-green font-bold">Get Started Now!</p>
            </div>
        </a>
    </div>
    </section>
    <!-- END: Section Introduction -->

    <!-- START : Collaborate Section -->

<section class="container px-5 collaborate" data-aos="fade-up">
    
</section>

<!-- END : Collaborate Section -->


    @endsection

