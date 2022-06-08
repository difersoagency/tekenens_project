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



        .avatar {
  position: relative;
  width: 50%;
}

.preview_photo {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.avatar:hover .preview_photo {
  opacity: 0.3;
}

.avatar:hover .middle {
  opacity: 1;
}

.text {
  background-color: #04AA6D;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
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
                @if(Session::has('error')  )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('error') }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
                @if(Session::has('success')  )
                <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('success') }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
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
                                            @if(count($dp) <= 0)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert"> No data found in database</div>
                                            @else

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
                                            @endif
                                        </div>
                                    </div>
								</div>
								<div class="tab-pane fade" id="pills-clrcontactinfo" role="tabpanel" aria-labelledby="pills-clrcontact-tabinfo">
                                    <div class="my-2">
                                        <button type="button" class="btn btn-primary btn-sm" id="create_partner"><i class="fa fa-plus"></i> Create</button>
                                    </div>
                                    @if(count($partner) <= 0)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert"> No data found in database</div>
                                    @else

									<div class="container">
                                        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-1 d-flex align-items-stretch">
                                            @foreach ($partner as $p )
                                            <div class="col">
                                                <div class="card h-100 rounded-1">
                                                    @if($p->photo != '')
                                                    <img src="{{asset('storage/'.$p->photo)}}"  class="card-img-top img-card-custom" alt="...">
                                                    @else

                                                    <img   src="{{asset('assets/images/dashboard/1.png')}}" class="card-img-top img-card-custom" alt="...">
                                                    @endif
                                                    <div class="card-body">
                                                        <p class="card-text text-center">{{ $p->name }}</p>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-between bg-light">
                                                            <button id="update_partner" type="button" class="btn btn-warning btn-xs update_partner" data-id="{{ $p->id }}"><i class="fa fa-pencil text-light fa-fw"></i></button>
                                                            <button  type="button" class="btn btn-danger btn-xs" id="delete_partner"  data-id="{{ $p->id }}"><i class="fa fa-trash text-light fa-fw"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
      </div>
       <div class="modal fade" id="partner_modal_create" tabindex="-1"  data-bs-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Partner</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"  ></button>
                </div>
                <div class="modal-body" id="create_partner_body">
                </div>
            </div>
        </div>
      </div>

       <div class="modal fade" id="partner_modal_update" tabindex="-1"  data-bs-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Partner</h5>
                    <button class="btn-close" type="button"   data-bs-dismiss="modal" ></button>
                </div>
                <div class="modal-body" id="edit_partner_body">
                </div>
             </div>
       </div>
      </div>


       @push('scripts')
       <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script>
        function view_image(value) {
    $('#upload_photo').change(function(){
        $('#check_image').val("1");
        $('#preview').removeClass("d-none");
        if(value == 'update'){
            $('#old_image').addClass("d-none");
        }


    let reader = new FileReader();

    reader.onload = (e) => {
        $('#preview_photo').attr('src', e.target.result);
    }


    reader.readAsDataURL(this.files[0]);

    var ext = this.files[0].name.split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
        $('#alert_ext').removeClass("d-none");
        $('#preview').addClass("d-none");

        }else{
            $('#alert_ext').addClass("d-none");
        }
         });
    }




        $(document).on('click', '#create_partner', function(event) {
event.preventDefault();
$.ajax({
    url: "/admin/partner/create/",
    beforeSend: function() {
        $('#loader').show();
    },
    // return the result
    success: function(result) {

        $('#partner_modal_create').modal("show");
        $('#create_partner_body').html(result).show();
        view_image("create");
    },

})
});







$(document).on('click', '.update_partner', function(event) {

event.preventDefault();

var id = $(this).data('id');
$.ajax({
    url: "/admin/partner/edit/" + id,
    beforeSend: function() {
        $('#loader').show();
    },
    // return the result
    success: function(result) {

        $('#partner_modal_update').modal("show");
        $('#edit_partner_body').html(result).show();
        view_image("update");
        delete_image();

    },

})
});

function remove_image() {
$('#upload_photo').val('');
$('#preview').addClass("d-none");
};

function delete_image(){
        $('#upload').removeClass("d-none");
        $('#get').addClass("d-none");

    }


$(document).on('click', '#delete_partner', function(){
                    var id = $(this).attr('data-id');
                    swal({
                        title: "Delete Partner?",
                        text: "Once deleted, you will not be able to recover Delete Partner",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '/admin/partner/delete',
                                type: 'DELETE',
                                dataType: 'json',
                                data: {"id": id, "_method": "DELETE", _token: "{{csrf_token()}}"},
                                success: function(result) {
                                    if(result.info == "success"){
                                        window.location.reload();
                                        swal(result.msg, {
                                            icon: "success",
                                        });
                                        window.location.reload();
                                    }
                                    else{
                                        swal(result.msg, {
                                            icon: "error",
                                        });
                                    }
                                }
                            });
                        } else {
                            swal("Delete has been cancelled");
                        }
                    })
                });


    </script>
    @endpush

@endsection
