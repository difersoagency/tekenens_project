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

        .img-card-custom{
            width: 100%;
            height: 15vw;
            object-fit: scale-down;"
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
                                        <a href="{{route('home.description.create')}}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create</a>
                                    </div>
									<div class="card border-0">
                                        <div class="card-body">
                                            <div class="default-according" id="accordion1">
                                                @foreach ($dp as $i)
                                                <div class="card">
                                                    <div class="card-header bg-info" id="headingFour">
                                                        <span class="d-flex justify-content-between">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link text-white" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">{{$i->title}}</button>
                                                            </h5>
                                                            <span class="px-2">
                                                                <a href="{{route('home.description.edit', ['id' => $i->id])}}" class="btn-edit"><i class="fa fa-pencil fa-fw text-light m-auto"></i></a>
                                                                <a href="{{route('home.description.create')}}" class="btn-delete"><i class="fa fa-trash fa-fw text-light m-auto"></i></a>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="collapse show" id="collapseFour" aria-labelledby="headingOne" data-bs-parent="#accordion1">
                                                        <div class="card m-3 border-0">
                                                            <div class="row g-0">
                                                              <div class="col-md-4">
                                                                <img src="{{asset('storage/images/home/'.$i->media)}}" class="img-fluid rounded-start" alt="...">
                                                              </div>
                                                              <div class="col-md-8">
                                                                <div class="card-body">
                                                                  <h5 class="card-title">{{$i->title}}</h5>
                                                                  <p class="card-text">{!! $i->description !!}</p>
                                                                  <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
								</div>
								<div class="tab-pane fade" id="pills-clrcontactinfo" role="tabpanel" aria-labelledby="pills-clrcontact-tabinfo">
                                    <div class="my-2">
                                        <button type="button" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#exampleModalmdo"><i class="fa fa-plus"></i> Create</button>
                                    </div>
									<div class="container">
                                        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-1 d-flex align-items-stretch">
                                            <div class="col">
                                                <div class="card h-100 rounded-1">
                                                    <img src="https://picsum.photos/200/300" class="card-img-top img-card-custom" alt="...">
                                                    <div class="card-body">
                                                        <p class="card-text text-center">PT. Panama Cocotta</p>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-between bg-light">
                                                            <a href="" type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil text-light fa-fw"></i></a>
                                                            <a href="" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash text-light fa-fw"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col">
                                                <div class="card h-100 rounded-1">
                                                    <img src="{{asset('assets/images/dashboard-2/6.png')}}" class="card-img-top img-card-custom" alt="...">
                                                    <div class="card-body">
                                                        <p class="card-text text-center">RMY</p>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-between bg-light">
                                                            <a href="" type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil text-light fa-fw"></i></a>
                                                            <a href="" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash text-light fa-fw"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card h-100 rounded-1">
                                                    <img src="{{asset('assets/images/dashboard-2/6.png')}}" class="card-img-top img-card-custom" alt="...">
                                                    <div class="card-body">
                                                        <p class="card-text text-center">Tresemee</p>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-between bg-light">
                                                            <a href="" type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil text-light fa-fw"></i></a>
                                                            <a href="" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash text-light fa-fw"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card h-100 rounded-1">
                                                    <img src="{{asset('assets/images/dashboard-2/6.png')}}" class="card-img-top img-card-custom" alt="...">
                                                    <div class="card-body">
                                                        <p class="card-text text-center">PT. Panama Cocotta</p>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-between bg-light">
                                                            <a href="" type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil text-light fa-fw"></i></a>
                                                            <a href="" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash text-light fa-fw"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card h-100 rounded-1">
                                                    <img src="{{asset('assets/images/dashboard-2/6.png')}}" class="card-img-top img-card-custom" alt="...">
                                                    <div class="card-body">
                                                        <p class="card-text text-center">PT. Panama Cocotta</p>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-between bg-light">
                                                            <a href="" type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil text-light fa-fw"></i></a>
                                                            <a href="" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash text-light fa-fw"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card h-100 rounded-1">
                                                    <img src="{{asset('assets/images/dashboard-2/6.png')}}" class="card-img-top img-card-custom" alt="...">
                                                    <div class="card-body">
                                                        <p class="card-text text-center">PT. Panama Cocotta</p>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-between bg-light">
                                                            <a href="" type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil text-light fa-fw"></i></a>
                                                            <a href="" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash text-light fa-fw"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card h-100 rounded-1">
                                                    <img src="{{asset('assets/images/dashboard-2/6.png')}}" class="card-img-top img-card-custom" alt="...">
                                                    <div class="card-body">
                                                        <p class="card-text text-center">PT. Panama Cocotta</p>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-between bg-light">
                                                            <a href="" type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil text-light fa-fw"></i></a>
                                                            <a href="" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash text-light fa-fw"></i></a>
                                                    </div>
                                                </div>
                                            </div> --}}
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
    <div class="modal fade" id="exampleModalmdo" tabindex="-1"  data-bs-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Partner</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="col-form-label" for="recipient-name">Name:</label>
                            <input class="form-control" placeholder="Name partner" type="text" value="">
                        </div>
                        <div class="mb-3">
                            <label class="col-sm-3 col-form-label" for="upload_photo">Upload Photo</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="upload_photo" type="file" name="photo"  accept="image/*"/>
                                <small class="text-danger d-none" id="alert_ext">Can only upload pictures format !</small>
                            </div>
                        </div>
                        <div class="mb-3 d-none"id="preview">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-9">
                                <img id="preview_photo"
                                    alt="preview image" style="max-height: 250px;">
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button"  disabled>Create</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
         $(document).ready(function (e) {
    $('#upload_photo').change(function(){
        $('#preview').removeClass("d-none");
    let reader = new FileReader();

    reader.onload = (e) => {
        $('#preview_photo').attr('src', e.target.result);
    }


    reader.readAsDataURL(this.files[0]);

    var ext = this.files[0].name.split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
        $('#alert_ext').removeClass("d-none");
        $('#preview').addClass("d-none");
        }else{
            $('#alert_ext').addClass("d-none");

        }
        });
    });
    </script>
    @endpush

@endsection
