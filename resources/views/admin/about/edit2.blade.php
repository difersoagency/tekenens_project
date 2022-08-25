@extends('layouts.admin.master')

@section('title')About Page
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/summernote.css')}}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>About</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('about.show')}}">About</a></li>
        <li class="breadcrumb-item active">Edit About Page</li>
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
                    <form class="theme-form mega-form" method="POST" action="{{route('about.update')}}" enctype="multipart/form-data">
                    @csrf
                        <h6>Details of About Page</h6>
                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Summary</label>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                        	<textarea class="form-control" type="text" name="summary" id="summary" placeholder="Enter Summary / Meta Description"> @if(isset($p->Page->meta_desc)) {{$p->Page->meta_desc}} @endif</textarea>
                            <div id="summary_fb" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Thumbnail</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <input class="form-control" type="file"  name="photo" id="photo" placeholder="Choose JPG/PNG File" accept="image/png, image/jpeg, image/jpg" @if(isset($p->media)) value="{{$p->media}}" @endif/>
                                <img id="uploadPreview" style="width:50%; height: auto" class="mt-1"  @if(isset($p->Page->media)) src="{{asset('storage/images/about/'.$p->Page->media)}}" @endif/>
                                <div id="photo_fb" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4" />
                        <h6>Description</h6>
                        <div class="mb-3">
                        	<textarea class="summernote" id="editor1" name="description">@if(isset($p->description)) {{$p->description}} @endif</textarea>
                            <div id="description_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <a type="button" class="btn btn-danger"  href="{{route('about.show')}}">Cancel</a>
                            <button type="submit" class="btn btn-success" id="submit">Save</button>
                        </div>
					</form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="{{asset('assets/js/jquery.ui.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    <!-- <script src="{{asset('assets/js/editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/styles.js')}}"></script>
    <script src="{{asset('assets/js/editor/ckeditor/ckeditor.custom.js')}}"></script> -->
    <script src="{{asset('assets/js/editor/summernote/summernote.js')}}"></script>
    <script src="{{asset('assets/js/editor/summernote/summernote.custom.js')}}"></script>
    <script src="{{asset('assets/js/tooltip-init.js')}}"></script>
    <script>
        $(function(){
            function validate(){
                if($('#summary').val() != "" && (!$('#photo').hasClass('is-invalid'))){
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

            $('#summary').on("keyup change", function(){
                if($(this).val() != ""){
                    $('#summary_fb').html("");
                    $(this).removeClass("is-invalid");
                }else{
                    $('#summary_fb').html("Summary is Required");
                    $(this).addClass("is-invalid");
                }
                validate();
            })

            $('#photo').on('change',function(){
                readURL(this);
                for(var i=0; i< $(this).get(0).files.length; ++i){
                    var file1 = $(this).get(0).files[i].size;
                    if(file1){
                        var file_size = $(this).get(0).files[i].size;
                        if(file_size > 2000000){
                            $('#photo_fb').html("File upload size is larger than 2MB");
                            $('#photo').addClass('is-invalid');
                        }else{
                            $('#photo_fb').html("");
                            $('#photo').removeClass('is-invalid');
                        }
                    }
                }
                validate();
            });

            $('#description').on("keyup change", function(){
                if($(this).val() != ""){
                    $('#description_fb').html("");
                    $(this).removeClass("is-invalid");
                }else{
                    $('#description_fb').html("Description of Job is Required");
                    $(this).addClass("is-invalid");
                }
                validate();
            });
        });
    </script>
	@endpush

@endsection
