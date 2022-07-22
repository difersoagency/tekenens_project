@extends('layouts.admin.master')

@section('title')Dashboard
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owlcarousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Home</h3>
		@endslot
	@endcomponent
    <div class="container">
		<div class="row">
			<div class="col-sm-12 col-xl-12 box-col-12">
				<div class="card">
					<div class="card-header pb-0">
						<h5>Website Engagement on 2022</h5>
					</div>
					<div class="card-body">
						<div id="area-spaline"></div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-xl-6">
			<div class="card">
					<div class="card-header pb-0">
						<h5>Most Popular Articles</h5>
					</div>
					<div class="card-body">
					@forelse($a as $i)
					<div class="media d-flex align-items-center">
                                    <img class="img-fluid" width="10%" src="{{asset('storage/images/article/'.$i->og_image)}}" alt="">
                                    <div class="media-body pl-2">
                                        <a href="#">
                                            <h6>{{$i->title}}</h6>
                                        </a>
                                        <p>{{$i->meta_desc}}</p>
                                        <!-- <ul class="rating-star">
                                            <li>                                      <i class="fa fa-star"></i></li>
                                            <li>                                      <i class="fa fa-star"></i></li>
                                            <li>                                      <i class="fa fa-star"></i></li>
                                            <li>                                      <i class="fa fa-star"></i></li>
                                            <li>                                      <i class="fa fa-star"></i></li>
                                        </ul> -->
                                    </div>
                                    <!-- <a class="btn btn-iconsolid" href="#"><i class="icon-bag"></i></a> -->
                                </div>
					@empty
					@endforelse
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-xl-6">
			<div class="card">
					<div class="card-header pb-0">
						<h5>Most Popular Portfolio</h5>
					</div>
					<div class="card-body">
					@forelse($p as $i)
					<div class="media">
						<img src="{{asset('storage/images/portofolio/'.$i->id.'/'.$i->DetailPortofolio->first()->media)}}" class="align-self-center mr-3" alt="..." style="width:10%;">
						<div class="media-body">
							<h6 class="mt-0 text-success">{{$i->title}}</h6>
							<p>{{$i->description}}</p>
						</div>
					</div>
					@empty

					@endforelse
					</div>
				</div>
			</div>
		</div>
	</div>
	@push('scripts')
	<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
	<!-- <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/js/chart/apex-chart/chart-custom.js') }}"></script> -->
	<script>
		$(function(){
			var options1 = {
				chart: {
					height: 350,
					type: 'area',
					toolbar:{
					show: false
					}
				},
				dataLabels: {
					enabled: false
				},
				stroke: {
					curve: 'smooth'
				},
				series: [{
					name: 'Visitor',
					data: [31, 40, 28, 51, 42, 109, 100, 120, 110, 100, 120, 110]
				}],

				xaxis: {
					type: 'string',
					categories: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
				},
				tooltip: {
					x: {
						format: 'string'
					},
				},
				colors:[vihoAdminConfig.primary]
			}

			var chart1 = new ApexCharts(
				document.querySelector("#area-spaline"),
				options1
			);

			chart1.render();
		})
	</script>
	@endpush
@endsection
