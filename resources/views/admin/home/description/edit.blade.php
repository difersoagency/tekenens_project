@extends('layouts.admin.master')

@section('title')Home Description
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/summernote.css')}}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Home</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('home.show')}}">Home</a></li>
        <li class="breadcrumb-item active">Edit Home Description</li>
    @endcomponent

    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
                @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('error') }}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                @endif
                @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('success') }}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                @endif
				<div class="card">
					<div class="card-body">
                    <form class="theme-form mega-form" method="POST" action="{{route('home.description.update', ['id' => $id])}}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                        <h6>Home Description</h6>
                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Title</label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                        	<input class="form-control" type="text" name="title" id="title" placeholder="Enter Description Title" value="{{$dp->title}}"/>
                            <div id="title_fb" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Image</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <input class="form-control" type="file"  name="thumbnail" id="thumbnail" placeholder="Choose JPG/PNG File" accept="image/png, image/jpeg, image/jpg" value="{{$dp->media}}"/>
                                <img id="uploadPreview" style="width:50%; height: auto" class="mt-1" src="{{asset('storage/images/home/'. $dp->media)}}"/>
                                <div id="thumbnail_fb" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4" />
                        <h6>Description</h6>
                        <div class="mb-3">
                        	<textarea class="form-control" id="editor1" name="content">{{$dp->description}}</textarea>
                            <div id="content_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <a type="button" class="btn btn-danger"  href="{{route('home.show')}}">Cancel</a>
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
            function validate(){
                if($('#title').val() != ""){
                    $('#submit').removeAttr('disabled');
                }else{
                    $('#submit').attr('disabled', true);
                }
            }

            function readURL(input) {
                if (input.files && input.files[0]) {
                    if(input.files[0].size <= 5000000){
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#uploadPreview').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                    else{
                        $('#uploadPreview').attr('src', "");
                    }
                }
                else{
                    $('#uploadPreview').removeAttr('src');
                }
            }

            $('#title').on("keyup change", function(){
                if($(this).val() != ""){
                    $('#title_fb').html("");
                    $(this).removeClass("is-invalid");
                }else{
                    $('#title_fb').html("Title is Required");
                    $(this).addClass("is-invalid");
                }
                validate();
            })

            $('#thumbnail').on('change',function(){
                readURL(this);
                for(var i=0; i< $(this).get(0).files.length; ++i){
                    var file1 = $(this).get(0).files[i].size;
                    if(file1){
                        var file_size = $(this).get(0).files[i].size;
                        if(file_size > 2000000){
                            $('#thumbnail_fb').html("File upload size is larger than 2MB");
                            $('#thumbnail').addClass('is-invalid');
                        }else{
                            $('#thumbnail_fb').html("");
                            $('#thumbnail').removeClass('is-invalid');
                        }
                    }
                }
                validate();
            });

            $('#content').on("keyup change", function(){
                if($(this).val() != ""){
                    $('#content_fb').html("");
                    $(this).removeClass("is-invalid");
                }else{
                    $('#content_fb').html("Description of Job is Required");
                    $(this).addClass("is-invalid");
                }
                validate();
            });
        });
    </script>
	@endpush

@endsection
