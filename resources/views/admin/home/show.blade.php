@extends('layouts.admin.master')

@section('title')Home
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owlcarousel.css')}}">
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
                                    <div class="mb-3"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</button></div>
                                    <div class="d-flex justify-content-center">
                                        <video class="bgvideo-comingsoon" width="100%" id="bgvid" poster="{{ asset('assets/images/other-images/coming-soon-bg.jpg') }}" playsinline="" autoplay="" muted="" loop="" >
                                            <source src="{{ asset('assets/video/auth-bg.mp4') }}" type="video/mp4" />
                                        </video>
                                    </div>
								</div>
								<div class="tab-pane fade" id="pills-clrprofileinfo" role="tabpanel" aria-labelledby="pills-clrprofile-tabinfo">
									<p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
										scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
										release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
									</p>
								</div>
								<div class="tab-pane fade" id="pills-clrcontactinfo" role="tabpanel" aria-labelledby="pills-clrcontact-tabinfo">
									<div class="owl-carousel owl-theme" id="owl-carousel-12">
                                        <div class="item">
                                            <div class="card">
                                                <div class="product-box">
                                                    <div class="product-img">
                                                        {{-- <div class="ribbon ribbon-danger">New</div> --}}
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card">
                                                <div class="product-box">
                                                    <div class="product-img">
                                                        {{-- <div class="ribbon ribbon-danger">New</div> --}}
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card">
                                                <div class="product-box">
                                                    <div class="product-img">
                                                        {{-- <div class="ribbon ribbon-danger">New</div> --}}
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card">
                                                <div class="product-box">
                                                    <div class="product-img">
                                                        {{-- <div class="ribbon ribbon-danger">New</div> --}}
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card">
                                                <div class="product-box">
                                                    <div class="product-img">
                                                        {{-- <div class="ribbon ribbon-danger">New</div> --}}
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card">
                                                <div class="product-box">
                                                    <div class="product-img">
                                                        {{-- <div class="ribbon ribbon-danger">New</div> --}}
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
       <script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
       <script src="{{asset('assets/js/owlcarousel/owl-custom.js')}}"></script>
    @endpush

@endsection
