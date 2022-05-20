@extends('layouts.admin.master')

@section('title')Home
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owlcarousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
    <style>
        .btn-edit{
            display: inline-block;
            text-decoration: none;
            background: #f1e4a1;
            color: #FFF;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            text-align: center;
            vertical-align: middle;
            overflow: hidden;
            transition: .4s;

        }

        .btn-edit:hover{
            background: #e4ca43;
        }

        .btn-delete{
            display: inline-block;
            text-decoration: none;
            background: #e4818b;
            color: #FFF;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            text-align: center;
            vertical-align: middle;
            overflow: hidden;
            transition: .4s;
        }

        .btn-delete:hover{
            background: #d43545;
        }
    </style>
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Home</h3>
		@endslot
		<li class="breadcrumb-item active">Home</li>
	@endcomponent

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
						<h4 class="pull-left">Home Page</h4>
					</div>
					<div class="card-body">
						<div class="tabbed-card">
							<ul class="pull-right nav nav-pills nav-primary" id="pills-clrtabinfo" role="tablist">
								<li class="nav-item"><a class="nav-link active" id="pills-clrhome-tabinfo" data-bs-toggle="pill" href="#pills-clrhomeinfo" role="tab" aria-controls="pills-clrhome" aria-selected="true">Video Banner</a></li>
								<li class="nav-item"><a class="nav-link" id="pills-clrprofile-tabinfo" data-bs-toggle="pill" href="#pills-clrprofileinfo" role="tab" aria-controls="pills-clrprofile" aria-selected="false">Description</a></li>
								<li class="nav-item"><a class="nav-link" id="pills-clrcontact-tabinfo" data-bs-toggle="pill" href="#pills-clrcontactinfo" role="tab" aria-controls="pills-clrcontact" aria-selected="false">Partner</a></li>
							</ul>
							<div class="tab-content" id="pills-clrtabContentinfo">
								<div class="tab-pane fade show active" id="pills-clrhomeinfo" role="tabpanel" aria-labelledby="pills-clrhome-tabinfo">
                                    <div class="my-2">
                                        <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil fa-fw"></i> Edit</button>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <video class="bgvideo-comingsoon" width="100%" id="bgvid" controls>
                                                    <source src="{{ asset('assets/video/auth-bg.mp4') }}" type="video/mp4" />
                                                </video>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<div class="tab-pane fade" id="pills-clrprofileinfo" role="tabpanel" aria-labelledby="pills-clrprofile-tabinfo">
                                    <div class="my-2">
                                        <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create</button>
                                    </div>
									<div class="card border-0">
                                        <div class="card-body">
                                            <div class="default-according" id="accordion1">
                                                <div class="card">
                                                    <div class="card-header bg-info" id="headingFour">
                                                        <span class="d-flex justify-content-between">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link text-white" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">Collapsible Group Item #<span>1</span></button>
                                                            </h5>
                                                            <span class="px-2">
                                                                <a href="" class="btn-edit"><i class="fa fa-pencil fa-fw text-light m-auto"></i></a>
                                                                <a href="" class="btn-delete"><i class="fa fa-trash fa-fw text-light m-auto"></i></a>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="collapse show" id="collapseFour" aria-labelledby="headingOne" data-bs-parent="#accordion1">
                                                        <div class="card m-3 border-0">
                                                            <div class="row g-0">
                                                              <div class="col-md-4">
                                                                <img src="..." class="img-fluid rounded-start" alt="...">
                                                              </div>
                                                              <div class="col-md-8">
                                                                <div class="card-body">
                                                                  <h5 class="card-title">Card title</h5>
                                                                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header bg-info" id="headingFive">
                                                        <span class="d-flex justify-content-between">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link collapsed text-white" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                    Collapsible Group Item #<span>2</span>
                                                                </button>
                                                            </h5>
                                                            <span class="px-2">
                                                                <a href="" class="btn-edit"><i class="fa fa-pencil text-light fa-fw m-auto"></i></a>
                                                                <a href="" class="btn-delete"><i class="fa fa-trash text-light fa-fw m-auto"></i></a>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-bs-parent="#accordion1">
                                                        <div class="card m-3 border-0">
                                                            <div class="row g-0">
                                                              <div class="col-md-4">
                                                                <img src="..." class="img-fluid rounded-start" alt="...">
                                                              </div>
                                                              <div class="col-md-8">
                                                                <div class="card-body">
                                                                  <h5 class="card-title">Card title</h5>
                                                                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header bg-info" id="headingSix">
                                                        <span class="d-flex justify-content-between">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link collapsed text-white" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                    Collapsible Group Item #<span>2</span>
                                                                </button>
                                                            </h5>
                                                            <span class="px-2">
                                                                <a href="" class="btn-edit"><i class="fa fa-pencil text-light fa-fw m-auto"></i></a>
                                                                <a href="" class="btn-delete"><i class="fa fa-trash text-light fa-fw m-auto"></i></a>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="collapse" id="collapseSix" aria-labelledby="headingSix" data-bs-parent="#accordion1">
                                                        <div class="card m-3 border-0">
                                                            <div class="row g-0">
                                                              <div class="col-md-4">
                                                                <img src="..." class="img-fluid rounded-start" alt="...">
                                                              </div>
                                                              <div class="col-md-8">
                                                                <div class="card-body">
                                                                  <h5 class="card-title">Card title</h5>
                                                                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<div class="tab-pane fade" id="pills-clrcontactinfo" role="tabpanel" aria-labelledby="pills-clrcontact-tabinfo">
                                    <div class="my-2">
                                        <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create</button>
                                    </div>
									<div class="container">
                                        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                            <div class="col">

                                                <div class="card">
                                                    <div class="top-dealerbox text-center">
                                                        <img class="card-img-top" src="{{asset('assets/images/dashboard-2/1.png')}}" alt="...">
                                                        <h6>PT. Equity World</h6>
                                                        <p>Partner</p>
                                                        <div class="d-flex justify-content-around  mb-2">
                                                            <a class="btn btn-warning btn-sm" href="#">Edit</a>
                                                            <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="product-box">
                                                        <div class="product-img">
                                                            <div class="ribbon ribbon-danger">New</div>
                                                            <img class="img-fluid" src="{{asset('assets/images/ecommerce/02.jpg')}}" alt="" />
                                                            <div class="product-hover">
                                                                <ul>
                                                                    <li>
                                                                        <a href="cart"><i class="icon-pencil"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter1"><i class="icon-trash"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-details align-items-center">
                                                            <p>PT. Equity World</p>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center">
                                                        <img class="card-img-top" src="{{asset('assets/images/dashboard-2/1.png')}}" alt="...">
                                                        <h6>PT. Wikaya Amartapura</h6>
                                                        <p>Partner</p>
                                                        <div class="d-flex justify-content-around  mb-2">
                                                            <a class="btn btn-warning btn-xs" href="#"><i class="fa fa-pencil"></i></a>
                                                            <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="product-box">
                                                        <div class="product-img">
                                                            <div class="ribbon ribbon-danger">New</div>
                                                            <img class="img-fluid" src="{{asset('assets/images/ecommerce/02.jpg')}}" alt="" />
                                                            <div class="product-hover">
                                                                <ul>
                                                                    <li>
                                                                        <a href="cart"><i class="icon-pencil"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter1"><i class="icon-trash"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-details align-items-center">
                                                            <p>PT. Wikaya Amartapura</p>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center">
                                                        <img class="card-img-top" src="{{asset('assets/images/dashboard-2/1.png')}}" alt="...">
                                                        <h6>Patt Lousi</h6>
                                                        <div class="d-flex justify-content-around  mb-2">
                                                            <a class="btn btn-warning btn-sm" href="#">Edit</a>
                                                            <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="product-box">
                                                        <div class="product-img">
                                                            <div class="ribbon ribbon-danger">New</div>
                                                            <img class="img-fluid" src="{{asset('assets/images/ecommerce/02.jpg')}}" alt="" />
                                                            <div class="product-hover">
                                                                <ul>
                                                                    <li>
                                                                        <a href="cart"><i class="icon-pencil"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter1"><i class="icon-trash"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-details align-items-center">
                                                            <p>Patt Lousi</p>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center">
                                                        <img class="card-img-top" src="{{asset('assets/images/dashboard-2/1.png')}}" alt="...">
                                                        <h6>CV. Nirwana Agung</h6>
                                                        <div class="d-flex justify-content-around  mb-2">
                                                            <a class="btn btn-warning btn-sm" href="#">Edit</a>
                                                            <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="product-box">
                                                        <div class="product-img">
                                                            <div class="ribbon ribbon-danger">New</div>
                                                            <img class="img-fluid" src="{{asset('assets/images/ecommerce/02.jpg')}}" alt="" />
                                                            <div class="product-hover">
                                                                <ul>
                                                                    <li>
                                                                        <a href="cart"><i class="icon-pencil"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter1"><i class="icon-trash"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-details align-items-center">
                                                            <p>CV. Nirwana Agung</p>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center">
                                                        <img class="card-img-top" src="{{asset('assets/images/dashboard-2/1.png')}}" alt="...">
                                                        <h6>Nurmalita Agustin</h6>
                                                        <div class="d-flex justify-content-around  mb-2"><a class="btn btn-warning btn-sm" href="#">Edit</a>
                                                        <a class="btn btn-danger btn-sm" href="#">Delete</a></div>
                                                    </div>
                                                    {{-- <div class="product-box">
                                                        <div class="product-img">
                                                            <div class="ribbon ribbon-danger">New</div>
                                                            <img class="img-fluid" src="{{asset('assets/images/ecommerce/02.jpg')}}" alt="" />
                                                            <div class="product-hover">
                                                                <ul>
                                                                    <li>
                                                                        <a href="cart"><i class="icon-pencil"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter1"><i class="icon-trash"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-details align-items-center">
                                                            <p>Nurmalita Agustin</p>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center">
                                                        <img class="card-img-top" src="{{asset('assets/images/dashboard-2/1.png')}}" alt="...">
                                                        <h6>Nihongo Mantappu</h6>
                                                        <div class="d-flex justify-content-around  mb-2"><a class="btn btn-warning btn-sm" href="#">Edit</a>
                                                        <a class="btn btn-danger btn-sm" href="#">Delete</a></div>
                                                    </div>
                                                    {{-- <div class="product-box">
                                                        <div class="product-img">
                                                            <div class="ribbon ribbon-danger">New</div>
                                                            <img class="img-fluid" src="{{asset('assets/images/ecommerce/02.jpg')}}" alt="" />
                                                            <div class="product-hover">
                                                                <ul>
                                                                    <li>
                                                                        <a href="cart"><i class="icon-pencil"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter1"><i class="icon-trash"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product-details align-items-center">
                                                            <p>Waseda Boys</p>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card">
                                                    <div class="top-dealerbox text-center">
                                                        <img class="card-img-top" src="{{asset('assets/images/dashboard-2/6.png')}}" alt="...">
                                                        <h6>Wilson Hill</h6>
                                                        <p>Denmark</p>
                                                        <a class="btn btn-rounded" href="#">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="item"><img src="{{asset('assets/images/slider/1.jpg')}}" alt="" /></div>
                                        <div class="item"><img src="{{asset('assets/images/slider/2.jpg')}}" alt="" /></div>
                                        <div class="item"><img src="{{asset('assets/images/slider/3.jpg')}}" alt="" /></div>
                                        <div class="item"><img src="{{asset('assets/images/slider/4.jpg')}}" alt="" /></div>
                                        <div class="item"><img src="{{asset('assets/images/slider/5.jpg')}}" alt="" /></div>
                                        <div class="item"><img src="{{asset('assets/images/slider/6.jpg')}}" alt="" /></div>
                                        <div class="item"><img src="{{asset('assets/images/slider/7.jpg')}}" alt="" /></div>
                                        <div class="item"><img src="{{asset('assets/images/slider/8.jpg')}}" alt="" /></div>
                                        <div class="item"><img src="{{asset('assets/images/slider/9.jpg')}}" alt="" /></div>
                                        <div class="item"><img src="{{asset('assets/images/slider/10.jpg')}}" alt="" /></div>
                                        <div class="item"><img src="{{asset('assets/images/slider/11.jpg')}}" alt="" /></div> --}}
                                    </div>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush

@endsection
