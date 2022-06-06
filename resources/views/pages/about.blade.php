@extends('layouts.front-website.master')
@section('og','Tekenens - Jasa Illustrasi dan Desain Karakter')

@section('content')
<!-- START: Banner -->
<section class="banner-images position-relative"> 
        <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="" width="100%" height="600px"> -->
        <div class="overlay text-center my-auto align-middle position-absolute"></div>
        <div class="title-page">
            <h1 class="align-middle font-bold">ABOUT<span class="text-white"> US.</span></h1>
            <p class="text-white">Find out more about Tekenens Studio <br> and the great people in it</p>
        </div>
        <img src="../../assets/images/banner-all.png" alt="Tentang Tekenens Studio" width="100%">
</section>
<!-- END: Banner -->

<!-- START: About Tekenens -->
<section class="container about-sect px-5">
    <div class="row justify-around">
        <div class="col-5">
            <h2 class="text-gray font-bold">
                All in <span class="text-green">One</span>
            </h2>
            <span class="text-green font-semibold">Illustration, Character Design, Realistic Drawing</span>
            <p>
            Tekenens Studio as a Drawing Studio that has complete services, everything you need for your needs is in Tekenens Studio, starting from illustrations, character designs, realistic drawings, to logo designs. All of this is done by professionals who are sure to produce the best results
            </p>
        </div>
        <div class="col-6">
            <img src="../../assets/images/about1.jpg" alt="" width="100%">
        </div>
    </div>
</section>
<!-- END: About Tekenens -->

<!-- START : Meet Our Team -->
<section class="container px-5 our-team mb-5">
    <h2 class="text-gray font-bold">MEET OUR <span class="text-green">TEAM</span></h2>
    <div class="row team-member justify-between mt-5">
        <div class="col-3 member mb-4 position-relative">
            <div class="text-overlay position-absolute text-center">
                <h3 class="text-white font-bold">Nama</h3>
                <p class="text-white">Jabatan</p>
            </div>
            <div class="overlay-team"></div>
            <img src="../../assets/images/placeholder-image.jpg" alt="Team Tekenens" width="90%" height="auto">
        </div>
        <div class="col-3 member mb-4 position-relative">
            <div class="overlay-team"></div>
            <img src="../../assets/images/placeholder-image.jpg" alt="Team Tekenens" width="90%" height="auto">
        </div>
        <div class="col-3 member mb-4 position-relative">
            <div class="overlay-team"></div>
            <img src="../../assets/images/placeholder-image.jpg" alt="Team Tekenens" width="90%" height="auto">
        </div>
        <div class="col-3 member mb-4 position-relative">
            <div class="overlay-team"></div>
            <img src="../../assets/images/placeholder-image.jpg" alt="Team Tekenens" width="90%" height="auto">
        </div>
        <div class="col-3 member mb-4 position-relative">
            <div class="overlay-team"></div>
            <img src="../../assets/images/placeholder-image.jpg" alt="Team Tekenens" width="90%" height="auto">
        </div>
        
    </div>
</section>
<!-- END : Meet Our Team -->
@endsection