@extends('layouts.front-website.master')
@section('og','Tekenens - Jasa Illustrasi dan Desain Karakter')
@section('content')

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
    <section class="contact-form container px-5 mt-5 mb-5">
        <p class="font-bold get-touch">GET in TOUCH !</p>
        <h2 class="title-form text-green font-bold">SCHEDULE <span class="text-gray">an MEETING</span></h2>
        <form method="POST" action="{{route('send_mail')}}">
            @csrf
        <div class="form mt-5">
            <p>Hello, My Name Is <input type="text" name="nama_klien" id="nama-klien" class="field-nama" placeholder="Your Name" required> and i'm looking for <input type="text" name="nama-klien" id="nama-klien" class="field-nama" placeholder="Tekenens Service" required> Get in touch with me at <input type="email" name="email_klien" id="email-klien" class="field-nama" placeholder="Your Email" required>. Tell us specifically what you need in the message column here <br><textarea name="messages" id="pesan-klien" class="field-pesan" placeholder="Leave Your Messages" rows="3" cols="5" required></textarea></p>
        </div>
        <button class="button-all mb-5" type="submit">
            <div class="circle"></div>
            <div class="oval">
                <p class="font-semibold">SEND MESSAGES</p>
            </div>
        </button>
        </form>
        <div class="socmed-contact row">
            @foreach ($data as $d )
            <div class="col-8">
                <div class="row g-4">
                <a href="/home" target="_blank" class="col">
                <div class="item-socmed">
                    <img src="../../assets/images/socmed-ig.png" alt="" width="50" height="50">
                    <span>{{$d->instagram}}</span>
                </div>
            </a>
            <a href="/contact" target="_blank" class="col">
                <div class="item-socmed">
                    <img src="../../assets/images/socmed-wa.png" alt="" width="50" height="50">
                    <span>{{$d->whatsapp}}</span>
                </div>
            </a>
            <a href="/about" target="_blank" class="col">
                <div class="item-socmed">
                    <img src="../../assets/images/socmed-mail.png" alt="" width="50" height="50">
                    <span>{{$d->email}}</span>
                </div>
            </a>
            @endforeach
        </div>
                </div>
           </div>
    </section>
    <!-- END: Contact Form -->
@endsection
