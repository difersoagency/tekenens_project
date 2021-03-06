@extends('layouts.admin.master')

@section('title')Portofolio
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/date-picker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dropzone.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Portofolio</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('portofolio.show')}}">Portofolio</a></li>
        <li class="breadcrumb-item active">Edit Portofolio</li>
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
                    <form class="theme-form mega-form" id="portofolio-form" method="POST" action="{{route('portofolio.update', ['id' => $id])}}" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <h6>Portofolio Information</h6>
                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Project Name</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <input class="form-control" type="text" id="project_name" name="project_name" placeholder="Enter Project Name" value="{{$p->title}}"/>
                                <div id="project_name_fb" class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Published Date</label>
                            <div class="col-lg-4 col-md-6 col-sm-8">
                                <input class="datepicker-here form-control digits" type="text" id="published_date" name="published_date" data-language="en"  value="{{ Carbon\Carbon::parse($p->publish_date)->format('m/d/Y') }}"/>
                                <div id="published_date_fb" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <?php $arrt = explode(',', $p->Team->implode('id', ','));?>
                        <div class="mb-3 row">
                            <label class="col-form-label col-12">Author</label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <select class="js-example-basic-multiple form-control col-sm-12" id="author" name="team_id[]" multiple="multiple" placeholder="Choose Author">
                                    @foreach($t as $ts)
                                        <option value="{{$ts->id}}" @if(in_array($ts->id, $arrt)) selected @endif>{{$ts->name}}</option>
                                    @endforeach
                                </select>
                                <div id="author_fb" class="invalid-feedback"></div>
                            </div>
                        </div>

                        <?php $arr = explode(',', $p->Category->implode('id', ','));?>
                        <div class="mb-3 row">
                            <label class="col-form-label col-12">Category</label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <select class="js-example-basic-multiple form-control col-sm-12" id="category_id" name="category_id[]" multiple="multiple" placeholder="Choose Category">
                                    @foreach($c as $cs)
                                        <option value="{{$cs->id}}" @if(in_array($cs->id, $arr)) selected @endif>{{$cs->name}}</option>
                                    @endforeach
                                </select>
                                <div id="category_id_fb" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Description</label>
                        	<textarea class="form-control" placeholder="Enter Description" id="description" name="description" placeholder="Enter Description of Project"> {{$p->description}}</textarea>
                            <div id="description_fb" class="invalid-feedback"></div>
                        </div>

                        <hr class="mt-4 mb-4" />
                        <h6>Web Information</h6>
                        <div class="mb-3">
                        	<label class="col-form-label">Status</label>
                            <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                <div class="radio radio-primary">
                                    <input id="radioinline1" type="radio" name="status" value="1" @if($p->status == "1") checked @endif>
                                    <label class="mb-0" for="radioinline1">Available</label>
                                </div>
                                <div class="radio radio-primary">
                                    <input id="radioinline2" type="radio" name="status" value="0" @if($p->status == "0") checked @endif>
                                    <label class="mb-0" for="radioinline2">Not Available</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Slug (url)</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <input class="form-control" type="text" id="slug" name="slug" placeholder="Enter Slug (url)"  value="{{$p->slug}}"/>
                                <div id="slug_fb" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Upload Portofolio</label>
                            <div id="imageUpload" class="dropzone dropzone-primary">
                                <div class="dz-message needsclick" id="image-upload-file">
                                    <i class="icon-cloud-up"></i>
                                    <h6>Drop files here or click to upload.</h6>
                                </div>
                            </div>
                            <div id="imageportofolio" hidden="true"></div>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <a type="button" class="btn btn-danger" href="{{route('portofolio.show')}}">Cancel</a>
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
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
    <script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
    <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    {{-- <script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script> --}}
    <script>
        Dropzone.autoDiscover = false;

        $(function(){
            function validate(){
                if($("#project_name").val() != "" && $('#published_date').val() != "" && $('#author').val() != "" && $('#description').val() != "" && (!$('#slug').hasClass('is-invalid') && $('#slug').val() != "")){
                    $('#submit').removeAttr('disabled');

                }else{
                    $('#submit').attr('disabled', true);
                }
            }

            $("#project_name").on('keyup change', function(){
                var val = $(this).val();
                if(val != ""){
                    $("#project_name_fb").html("");
                    $(this).removeClass("is-invalid");
                } else {
                    $("#project_name_fb").html("Project Name is Required");
                    $(this).addClass("is-invalid");
                }

                validate();
            });

            $("#published_date").on('keyup change', function(){
                var val = $(this).val();
                if(val != ""){
                    $("#published_date_fb").html("");
                    $(this).removeClass("is-invalid");
                } else {
                    $("#published_date_fb").html("Published Date is Required");
                    $(this).addClass("is-invalid");
                }

                validate();
            });

            $("#author").on('change', function(){
                var val = $(this).val();
                if(val != ""){
                    $("#author_fb").html("");
                    $(this).removeClass("is-invalid");
                } else {
                    $("#author_fb").html("Author is Required");
                    $(this).addClass("is-invalid");
                }

                validate();
            });

            $("#description").on('keyup change', function(){
                var val = $(this).val();
                if(val != ""){
                    $("#description_fb").html("");
                    $(this).removeClass("is-invalid");
                } else {
                    $("#description_fb").html("Description is Required");
                    $(this).addClass("is-invalid");
                }

                validate();
            });

            function validateSlug($slug){
                var slugReg = /^\S*$/;
                return slugReg.test($slug);
            }

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

            $("#category_id").on('keyup change', function(){
                var val = $(this).val();
                if(val != ""){
                    $("#category_id_fb").html("");
                    $(this).removeClass("is-invalid");
                } else {
                    $("#category_id_fb").html("Category is Required");
                    $(this).addClass("is-invalid");
                }

                validate();
            });

            var uploadedDocumentMap = {}
            myDropzone = new Dropzone('div#imageUpload', {
                addRemoveLinks: true,
                acceptedFiles: "image/*, video/*",
                uploadMultiple: true,
                parallelUploads: 100,
                maxFiles: 10,
                maxFilesize: 10,
                paramName: 'file',
                clickable: true,
                url: '{{ route("portofolio.storeMedia") }}',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(file, response) {
                    $('#imageportofolio').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
                    uploadedDocumentMap[file.name] = response.name
                    console.log('its file'+file)
                },
                removedfile: function(file) {

                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.name !== 'undefined') {
                        name = file.name
                        console.log(file.name);
                    } else {
                        name = uploadedDocumentMap[file.name]
                    }
                    $('#imageportofolio').find('input[name="photo[]"][value="' + name + '"]').remove()
                },
                init: function() {
                    console.log('init');
                    this.on("error", function(file, message) {
                        swal(message, {
                            icon: "error",
                        });
                        this.removeFile(file);
                    });
                    $.ajax({
                        url: '/admin/portofolio/showMedia/'+'{{$id}}',
                        type: 'get',
                        dataType: 'json',
                        success: function(response){
                            var count = 0;
                            var mockFile = [];
                            $.each(response, function(key,value) {
                                $.each(value, function(keys,val) {
                                mockFile[count] = { name: value[count]['name'], size: value[count]['size'] };
                                console.log(mockFile);
                                myDropzone.emit("addedfile", mockFile[count]);
                                myDropzone.emit("thumbnail", mockFile[count], "{{asset('storage/images/portofolio')}}/{{$id}}/"+value[count]['name']);
                                myDropzone.emit("complete", mockFile[count]);
                                $('img').css("max-width", "100%");
                                $('img').css("max-height", "100%");
                                $('img').css('object-fit', 'contain');
                                $('#imageportofolio').append('<input type="hidden" name="photo[]" value="' + value[count]['name'] + '">')
                                count++;
                                });
                            });

                        }
                    });
                }
            });
        });
    </script>
	@endpush

@endsection
