@extends('layouts.admin.master')

@section('title')Teams
 {{ $title }}
@endsection

@push('css')
<style>
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
			<h3>Teams</h3>
		@endslot
		<li class="breadcrumb-item active">Teams</li>
	@endcomponent
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
	<div class="container-fluid">
        <div class="mb-3"><button type="button" class="btn btn-primary btn-sm" id="create"><i
        class="fa fa-plus"></i> Create</button></div>

        @if(count($data) <= 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert"> No data found in database</div>
        @else
        <div class="row row-cols-1 row-cols-lg-2 g-2 g-lg-2 d-flex align-items-stretch">
            @foreach ($data as $d )
	        <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
	            <div class="card custom-card">
                    <div class="card-profile">
                        @if($d->photo)
                        <img class="img-100 b-r-8" src="{{asset('storage/'.$d->photo)}}"  alt="" />
                        @else
                        <img class="img-100 b-r-8"  src="{{asset('assets/images/dashboard/1.png')}}"  alt="" />
                        @endif
                    </div>
	                <div class="text-center profile-details">
	                   <h4>{{$d->name}}</h4>
	                    <h6>{{$d->role}}</h6>
	                </div>
	                <div class="card-footer row">
	                    <div class="col-6 col-sm-6">
                            <button class="btn btn-warning update_team" type="button" id="update_team" data-id="{{ $d->id }}">Edit</button>
	                    </div>
	                    <div class="col-6 col-sm-6">
                            <button class="btn btn-danger" type="button"  id="delete_team" onclick="delete_team({{ $d->id }})"  >Delete</button>
	                    </div>
	                </div>
	            </div>
	        </div>
       @endforeach
        </div>
        @endif
	</div>

    <div class="modal fade" id="team_modal_create" tabindex="-1"  data-bs-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Team</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"  ></button>
                </div>
                <div class="modal-body" id="create_team_body">
                </div>
            </div>
        </div>
      </div>

      <div class="modal fade" id="team_modal_update" tabindex="-1"  data-bs-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Team</h5>
                    <button class="btn-close" type="button"   data-bs-dismiss="modal" ></button>
                </div>
                <div class="modal-body" id="edit_team_body">
                </div>
             </div>
       </div>
      </div>

	@push('scripts')
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script>
       function delete_team (id){
                    swal({
                        title: "Delete Team ?",
                        text: "Once deleted, you will not be able to recover Delete Team",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '/admin/team/delete',
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
                }

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


    function remove_image() {
$('#upload_photo').val('');
$('#preview').addClass("d-none");
};

function delete_image(){
        $('#upload').removeClass("d-none");
        $('#get').addClass("d-none");

    }

                $(document).on('click', '#create', function(event) {
event.preventDefault();
$.ajax({
    url: "/admin/team/create/",
    beforeSend: function() {
        $('#loader').show();
    },
    // return the result
    success: function(result) {

        $('#team_modal_create').modal("show");
        $('#create_team_body').html(result).show();
        view_image("create");
    },

})
});


$(document).on('click', '.update_team', function(event) {

event.preventDefault();

var id = $(this).data('id');
$.ajax({
    url: "/admin/team/edit/" + id,
    beforeSend: function() {
        $('#loader').show();
    },
    // return the result
    success: function(result) {

        $('#team_modal_update').modal("show");
        $('#edit_team_body').html(result).show();
        view_image("update");
        delete_image();

    },

})
});
        </script>
	@endpush

@endsection
