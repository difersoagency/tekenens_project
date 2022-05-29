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
		<li class="breadcrumb-item">Teams</li>
		<li class="breadcrumb-item active">Create</li>
	@endcomponent

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-xl-6">
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
                        <form action="{{route('team.store')}}" method="POST"  enctype="multipart/form-data">
                            @csrf
						<div class="card">
							<div class="card-header pb-0">
								<h5>Create new team</h5>
								<span>the team will be shown on the front page of the web</span>
							</div>
							<div class="card-body">
								<div class="theme-form">
									<div class="mb-3 row">
										<label class="col-sm-3 col-form-label" for="inputEmail3">Name</label>
										<div class="col-sm-9">
											<input class="form-control" id="name" type="text" name="name" placeholder="Name of the person" />
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-sm-3 col-form-label" for="inputPassword3">Role</label>
										<div class="col-sm-9">
											<input class="form-control" id="role" type="text" name="role" placeholder="Ex : editor, photographer" />
										</div>
                                        <div class="invalid-feedback">Example invalid select feedback</div>
									</div>
									<div class="mb-3 row">
										<label class="col-sm-3 col-form-label" for="inputPassword3">Upload Photo</label>
										<div class="col-sm-9">
											<input class="form-control" id="upload_photo" type="file" name="photo"  accept="image/*"/>
                                            <small class="text-danger d-none" id="alert_ext">Can only upload pictures format !</small>
                                        </div>
									</div>
									<div class="mb-3 row d-none"id="preview">
                                        <div class="col-sm-3">
                                        </div>
                                        <div class="col-sm-9">
                                            <img id="preview_photo"
                                                alt="preview image" style="max-height: 250px;">
                                                {{-- <button class="btn btn-danger" id="reset_upload"><i class="fa fa-trash-o"></i></button> --}}
                                        </div>

									</div>
									<fieldset class="mb-3">
										<div class="row">
											<label class="col-form-label col-sm-3 pt-0">Status</label>
											<div class="col-sm-9">
												<div class="form-check radio radio-primary">
													<input class="form-check-input" id="radio11" type="radio" name="status" value="1"  checked/>
													<label class="form-check-label" for="radio11">Enabled</label>
												</div>
												<div class="form-check radio radio-primary">
													<input class="form-check-input" id="radio22" type="radio" name="status" value="0" />
													<label class="form-check-label" for="radio22">Disabled</label>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
							<div class="card-footer">
								<button class="btn btn-primary" disabled id="create">Submit</button>
								<a class="btn btn-secondary" href="{{route('team.show')}}">Cancel</a>
							</div>
						</div>
                    </form>
					</div>
				</div>
			</div>

		</div>
	</div>

	@push('scripts')
	<script src="{{asset('assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>

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


    $('#name').on('keyup change', function() {
            if ($(this).val() != "") {
                if ($('#role').val() != "" &&  $('#alert_ext').hasClass('d-none') ) {
                    $('#create').attr("disabled", false);
                } else {
                    $('#create').attr("disabled", true);
                }
            } else {
                $('#create').attr("disabled", true);
            }
        });

    $('#role').on('keyup change', function() {
            if ($(this).val() != "") {
                if ($('#name').val() != ""  &&  $('#alert_ext').hasClass('d-none')) {
                    $('#create').attr("disabled", false);
                } else {
                    $('#create').attr("disabled", true);
                }
            } else {
                $('#create').attr("disabled", true);
            }
        });


    $('#upload_photo').on('keyup change', function() {
            if ($('#alert_ext').hasClass('d-none') && $('#name').val() != ""  && ($('#role').val() != "" )) {
                    $('#create').attr("disabled", false);
            } else {
                $('#create').attr("disabled", true);
            }
        });
    });

    </script>
	@endpush

@endsection
