@extends('layouts.admin.master')

@section('title')Teams
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Teams</h3>
		@endslot
		<li class="breadcrumb-item active">Teams</li>
	@endcomponent

	<div class="container-fluid">
        <div class="mb-3"><a type="button" class="btn btn-primary btn-sm" href="{{route('team.create')}}"><i
        class="fa fa-plus"></i> Create</a></div>

        @if(count($data) <= 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert"> No data found in database</div>
        @else
        <div class="row row-cols-1 row-cols-lg-2 g-2 g-lg-2 d-flex align-items-stretch">
            @foreach ($data as $d )
	        <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
	            <div class="card custom-card">
                    <div class="card-profile">
                        @if($d->photo)
                        <img class="rounded-circle"  src="{{asset('storage/'.$d->photo)}}"  alt="" />
                        @else
                        <img class="rounded-circle"  src="{{asset('assets/images/dashboard/1.png')}}"  alt="" />
                        @endif
                    </div>
	                <div class="text-center profile-details">
	                   <h4>{{$d->name}}</h4>
	                    <h6>{{$d->role}}</h6>
	                </div>
	                <div class="card-footer row">
	                    <div class="col-6 col-sm-6">
                            <a href="{{route('team.edit',$d->id)}}" class="btn btn-warning" type="button">Edit</a>
	                    </div>
	                    <div class="col-6 col-sm-6">
                            <button class="btn btn-danger" type="button"  id="delete_team" onclick="delete_team()" data-id="{{ $d->id }}" >Delete</button>
	                    </div>
	                </div>
	            </div>
	        </div>
       @endforeach
        </div>
        @endif
	</div>


	@push('scripts')
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script>
       function delete_team (){
                    var id = $(this).attr('data-id');
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
                }
        </script>
	@endpush

@endsection
