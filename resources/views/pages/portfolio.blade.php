    @extends('layouts.front-website.master')
    @section('og','Tekenens - Jasa Illustrasi dan Desain Karakter')
    @section('content')

    <!-- START: Banner -->
    <section class="banner-images position-relative">
        <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="" width="100%" height="600px"> -->
        <div class="banner-parallax"></div>
        <div class="overlay text-center my-auto align-middle position-absolute"></div>
        <div class="title-page container px-5">
            <h1 class="align-middle font-bold">OUR<span class="text-white"> PORTFOLIO</span></h1>
            <p class="text-white ">The results of the work of Tekenens Studio produced by talented artists and provide maximum results in each of their works</p>
        </div>
        <!-- <img src="../../assets/images/banner-all.png" alt="Tentang Tekenens Studio" width="100%"> -->
    </section>
    <!-- END: Banner -->

    <!-- START: Section Portfolio -->
    <section class="portfolio-archive my-5">
        <div class="container px-5 text-center">
            <p>Masterpieces from Artists in Tekenens Studio with all categories, see the best work from our Artists and we are waiting for your project to become one of our best works too</p>
        </div>
        <div class="category-text mt-4 px-5 row mx-auto">
            <div class="col-6 col-md-2 text-center font-semibold">
                <a href="" data-id="0" id="cat0"class="active category_filter">All</a>
            </div>
            @foreach ($category as $c )
            <div class="col-6 col-md-2 text-center font-semibold">
                <a type="button" data-id="{{$c->id}}" id="cat{{$c->id}}" class="category_filter">{{ucfirst($c->name)}} </a>
            </div>
            @endforeach
        </div>
        <div class="layout-portfolio row mt-5 px-5 container mx-auto gap-md-3" id="portfolio_body">
            @include('pages.portfolio_data')
        </div>
    </section>
    <!-- END: Section Portfolio -->


    @endsection
