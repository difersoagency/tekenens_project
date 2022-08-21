
    @extends('layouts.front-website.master')
    @section('og','Tekenens - Jasa Illustrasi dan Desain Karakter')
    @section('description','Tekenens sebagai jasa Illustrasi dan Desain Karakter yang terpercaya menghasilkan hasil yang terbaik dan maksimal.')

    @section('content')
    <!-- START: Banner -->
    <section class="banner">
        <div class="h1banner container-fluid px-5">
            <h1 class="text-white h1text font-bold">Tailor-made <br> <span class="text-yellow">Illustrations</span>  and <br> <span class="text-yellow">Designs Character</span></h1>
        </div>
        <!-- <img src="../../assets/images/loadingBanner.png" alt="Loading Banner" class="" width="100%" height="600px"> -->
        <div class="overlay-gradient"></div>
        <div class="overlay">
        </div>
        <!-- <video src="{{asset('storage/images/home/'.$home->media)}}" width="100%" autoplay muted loop></video> -->
        <video src="{{asset('storage/images/home/'.$home->media)}}" width="100%" autoplay muted loop></video>
    </section>
    <!-- END: Banner -->

    <!-- START: Pattern -->
    <img src="../../assets/images/pattern.png" alt="Pattern" class="bg-pattern" width="100%" height="100%">
    <!-- END: Pattern -->

    <!-- START: Section Introduction -->
    <section class="mt-5 container px-5 px-md-3 px-lg-5 intro">
        <div class="row">
            <div class="text-center col-12 col-md-6" data-aos-delay="1000" data-aos-duration="1500" data-aos="fade-up">
                <img src="../../assets/images/circle1.png" alt="Loading Banner" class="floating-long position-absolute c3" width="55px" height="auto">
                <img src="../../assets/images/circle1.png" alt="Loading Banner" class="floating-short position-absolute c1" width="66px" height="auto">
                <img src="../../assets/images/circle1.png" alt="Loading Banner" class="floating-upside position-absolute c2" width="44px" height="auto">
                <img src="../../assets/images/karakter-home.png" alt="Desain Karakter Tekenens" width="60%" height="auto">
            </div>
            <div class="col" data-aos="fade-down" data-aos-delay="1000" data-aos-duration="1500">
                <p class="text-gray font-weight-bold font-medium font-semibold">Hello!</p>
                <h1 class="text-gray font-bold">
                WELCOME TO <br><span class="text-green">TEKENENS WORLD!<span>
                </h1>
                <p class="text-justify mb-4">
                Tekenens is an illustration and character design service for professional and experienced artists to produce the best quality images. And also Can create illustrations with various themes and genres for various needs, Learn more about Tekenens and prepare to be amazed by the results of the drawings from the artists at Tekenens
                </p>
                <button class="button-all">
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
        <h2 class="font-bold heading2" data-aos="fade-right" data-aos-delay="1000" data-aos-duration="1000">OUR <span>PORTOFOLIO</span></h2>
        <?php $c = 0;?>
        @forelse($portofolio as $p)
        @if($c % 2 == 0)
        <div class="row" data-aos="flip-left" data-aos-delay="1500" data-aos-duration="1500" >
        @endif
        <div class="col-12 col-md-6 position-relative pr-0 mb-4" data-aos="zoom-in">
            <img src="{{asset('storage/images/portofolio/'.$p->id.'/'.$p->DetailPortofolio->first()->media)}}" alt="{{$p->DetailPortofolio->first()->title}}" width="100%" height="385px">
            <div class="overlay-porto-home px-4 text-white">
                <h2>{{$p->title}} {{$c % 2}}</h2>
                <p>{{$p->title}} ({{ date('Y', strtotime($p->publish_date)) }})</p>
            </div>
        </div>
        @if($c % 2 == 1)
        </div>
        @endif
        <?php $c++; ?>
        @empty
        @endforelse

        <div class="row button-port">
            <div class="col">
                <button class="button-all more_porto"  data-aos="fade-left" data-aos-delay="1000" data-aos-duration="1000">
                    <div class="circle"></div>
                    <div class="oval">
                        <p class="font-semibold">MORE PORTFOLIO</p>
                    </div>
                </button>
            </div>
    </section>
    <!-- END: Section Portfolio -->

    <!-- START: Section Testimoni -->
    <section class="container px-5 testimoni-sect">
        <h2 class="font-bold text-gray" data-aos="fade-out" data-aos-delay="1000" data-aos-duration="1000">WHAT OUR <span class="text-green"> CLIENT SAY.. </span></h2>
        <div class="row px-2 h-96"  data-aos="fade-in" data-aos-delay="1000" data-aos-duration="1000">
            <div class="col text-center owl-carousel">
            @foreach ($testimoni as $t )
                <div data-aos="fade-in" data-aos-delay="1000" data-aos-duration="1000">
                    <img src="{{asset('storage/'.$t->photo)}}" alt="Avatar Testimoni" width="95px" height="95px" class="m-auto rounded-circle" data-aos="fade-in" data-aos-delay="700" data-aos-duration="1000">
                    <p class="text-yellow testimoni-content mt-2 text-sm" data-aos="fade-in" data-aos-delay="850" data-aos-duration="1000"> {!! Str::words($t->description, 20, ' ...') !!}</p>
                    <p class="text-yellow mt-2 text-sm testimoni-name" data-aos="fade-in" data-aos-delay="1000" data-aos-duration="1000">{{$t->name}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END: Section Testimoni -->
    @endsection



