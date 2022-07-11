@extends('layouts.front-website.master')
@section('og','Jasa Desain Karakter di Indonesia')
@section('description','Tekenens merupakan pilihan terbaik untuk Anda yang membutuhkan Jasa Desain Karakter di Indonesia')

@section('content')
<!-- START: Banner -->
<section class="banner-images position-relative">
        <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="" width="100%" height="600px"> -->
        <div class="banner-parallax"></div>
        <div class="overlay text-center my-auto align-middle position-absolute"></div>
        <div class="title-page">
            <h1 class="align-middle font-bold">ABOUT<span class="text-white"> TEKENENS</span></h1>
            <p class="text-white">@if(isset($about)){!! $about->page->meta_desc !!}@endif</p>
        </div>
        <!-- <img src="../../assets/images/banner-all.png" alt="Tentang Tekenens Studio" width="100%"> -->
</section>
<!-- END: Banner -->

<!-- START: About Tekenens -->
<section class="container about-sect px-5">
    <div class="row justify-around align-items-center">
        @if(isset($about))
        <div class="col-12 col-md-6 col-lg-5" data-aos="fade-up">
            <h2 class="text-gray font-bold">
                All in <span class="text-green">One</span>
            </h2>
            <span class="text-green font-semibold">Illustration, Character Design, Realistic Drawing</span>
            <p>
            {!! $about->description !!}
            </p>
        </div>
        <div class="col-12 col-md-6">
            @if(isset($about))
            <img src="{{asset('storage/images/about/'.$about->page->media)}}" alt="" width="100%">
            @endif
        </div>
        @endif
    </div>
</section>
<!-- END: About Tekenens -->

<!-- START : Meet Our Team -->
<section class="container px-5 our-team mb-5">
    <h2 class="text-gray font-bold" data-aos="fade-bottom">MEET OUR <span class="text-green">TEAM</span></h2>
    <div class="row team-member justify-between mt-5">
        @foreach ($team as $t )
        <div class="col-6 col-md-3 member mb-4 position-relative" data-aos="flip-right">
            <div class="overlay-team text-center">
                <h3 class="text-white font-bold">{{$t->name}}</h3>
                <p class="text-white">{{$t->role}}</p>
            </div>
            <img src="{{asset('storage/'.$t->photo)}}" alt="Team Tekenens" width="90%" height="auto" style="border-radius: 15px;">
        </div>
        @endforeach

        {{-- <div class="col-6 col-md-3 member mb-4 position-relative">
            <div class="overlay-team text-center">
                <h3 class="text-white font-bold">Nama</h3>
                <p class="text-white">Jabatan</p>
            </div>
            <img src="../../assets/images/placeholder-image.jpg" alt="Team Tekenens" width="90%" height="auto">
        </div>
        <div class="col-6 col-md-3 member mb-4 position-relative">
            <div class="overlay-team text-center">
                <h3 class="text-white font-bold">Nama</h3>
                <p class="text-white">Jabatan</p>
            </div>
            <img src="../../assets/images/placeholder-image.jpg" alt="Team Tekenens" width="90%" height="auto">
        </div>
        <div class="col-6 col-md-3 member mb-4 position-relative">
            <div class="overlay-team text-center">
                <h3 class="text-white font-bold">Nama</h3>
                <p class="text-white">Jabatan</p>
            </div>
            <img src="../../assets/images/placeholder-image.jpg" alt="Team Tekenens" width="90%" height="auto">
        </div>
        <div class="col-6 col-md-3 member mb-4 position-relative">
            <div class="overlay-team text-center">
            <h3 class="text-white font-bold">Nama</h3>
                <p class="text-white">Jabatan</p>
            </div>
            <img src="../../assets/images/placeholder-image.jpg" alt="Team Tekenens" width="90%" height="auto">
        </div> --}}
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
@endsection
