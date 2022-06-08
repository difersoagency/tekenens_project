@extends('layouts.admin.master')

@section('title')Job Vacancy
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/summernote.css')}}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Job Vacancy</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('job_vacancy.show')}}">Job Vacancy</a></li>
        <li class="breadcrumb-item active">Create Job Vacancy</li>
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
					<div class="card-body">
                    <form class="theme-form mega-form" method="POST" action="{{route('job_vacancy.store')}}" enctype="multipart/form-data">
                    @csrf
                        <h6>Job Vacancy Information</h6>
                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Title</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <input class="form-control" type="text" name="title" id="title" placeholder="Enter Job Vacany Title" />
                                <div id="title_fb" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Email</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email" />
                                <div id="email_fb" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Thumbnail</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                        	    <input class="form-control" type="file" id="thumbnail" name="thumbnail" placeholder="Choose JPG/PNG File" accept="image/png, image/jpeg, image/jpg"/>
                                <img id="uploadPreview" style="width:50%; height: auto" class="mt-1"/>
                                <div id="thumbnail_fb" class="invalid-feedback"></div>
                            </div>
                        </div>


                        <hr class="mt-4 mb-4" />
                        <h6>Web Information</h6>
                        <div class="mb-3">
                        	<label class="col-form-label">Status</label>
                            <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                <div class="radio radio-primary">
                                    <input id="radioinline1" type="radio" name="status" value="1">
                                    <label class="mb-0" for="radioinline1">Available</label>
                                </div>
                                <div class="radio radio-primary">
                                    <input id="radioinline2" type="radio" name="status" value="0" checked>
                                    <label class="mb-0" for="radioinline2">Not Available</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                        	<label class="col-form-label">Slug (url)</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <input class="form-control" type="text"  name="slug" id="slug" placeholder="Enter Slug (url)" />
                                <div id="slug_fb" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Description of Job</label>
                        	<textarea class="form-control" id="editor1" name="content"></textarea>
                            <div id="content_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <a type="button" class="btn btn-danger" href="{{route('job_vacancy.show')}}">Cancel</a>
                            <button type="submit" class="btn btn-success" id="submit">Submit</button>
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
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/styles.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/ckeditor.custom.js')}}"></script>
    <script>
        $(function(){
            $('#submit').attr('disabled', true);

            function validate(){
                if($('#title').val() != "" && (!$('#slug').hasClass('is-invalid') && $('#slug').val() != "") && (!$('#thumbnail').hasClass('is-invalid') && $('#thumbnail').val() != "") && (!$('#email').hasClass('is-invalid') && $('#email').val() != "")){
                    $('#submit').removeAttr('disabled');
                }else{
                    $('#submit').attr('disabled', true);
                }
            }

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#uploadPreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                else{
                    $('#uploadPreview').attr('src', "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=='");
                }
            }

            $("#thumbnail").change(function(){
                readURL(this);
                for(var i=0; i< $(this).get(0).files.length; ++i){
                    var file1 = $(this).get(0).files[i].size;
                    if(file1){
                        var file_size = $(this).get(0).files[i].size;
                        if(file_size > 5000000){
                            $('#uploadPreview').attr('src', "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=='");
                            $('#thumbnail_fb').html("File upload size is larger than 5MB");
                            $('#thumbnail').addClass('is-invalid');
                        }else{
                            $('#thumbnail_fb').html("");
                            $('#thumbnail').removeClass('is-invalid');
                        }
                    }
                }
                validate();
            });


            function validateEmail($email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                return emailReg.test( $email );
            }

            function validateSlug($slug){
                var slugReg = /^\S*$/;
                return slugReg.test($slug);
            }

            $('#title').on("keyup change", function(){
                if($(this).val() != ""){
                    $('#title_fb').html("");
                    $(this).removeClass("is-invalid");
                } else {
                    $('#title_fb').html("Title is Required");
                    $(this).addClass("is-invalid");
                }
                validate();
            })

            $('#slug').on("keyup change", function(){
                if($(this).val() != ""){
                    if(!validateSlug($(this).val())){
                        $('#slug_fb').html("Cannot contain whitespace");
                        $(this).addClass("is-invalid");
                    }else{
                        $('#slug_fb').html("");
                        $(this).removeClass("is-invalid");
                    }
                }else{
                    $('#slug_fb').html("Slug is Required");
                    $(this).addClass("is-invalid");
                }
                validate();
            })

            $('#email').on("keyup change", function(){
                if($(this).val() != ""){
                    if(!validateEmail($(this).val())){
                        $('#email_fb').html("Must contain email (ex: @example.com)");
                        $(this).addClass("is-invalid");
                    }else{
                        $('#email_fb').html("");
                        $(this).removeClass("is-invalid");
                    }
                }else{
                    $('#email_fb').html("Email is Required");
                    $(this).addClass("is-invalid");
                }
                validate();
            })

            $('#content').on("keyup change", function(){
                if($(this).val() != ""){
                    $('#content_fb').html("");
                    $(this).removeClass("is-invalid");
                }else{
                    $('#content_fb').html("Description of Job is Required");
                    $(this).addClass("is-invalid");
                }
                validate();
            })
        });
    </script>
	@endpush

@endsection
