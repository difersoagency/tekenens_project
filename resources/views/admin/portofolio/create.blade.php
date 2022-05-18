@extends('layouts.admin.master')

@section('title')Portofolio
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/date-picker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dropzone.css')}}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Portofolio</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('portofolio.show')}}">Portofolio</a></li>
        <li class="breadcrumb-item active">Create Portofolio</li>
    @endcomponent

    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
                    <form class="theme-form mega-form" id="portofolio-form" action="POST" url="{{route('portofolio.store')}}" enctype="multipart/form-data">
                        <h6>Portofolio Information</h6>
                        <div class="mb-3">
                        	<label class="col-form-label">Project Name</label>
                        	<input class="form-control" type="text" id="project_name" name="project_name" placeholder="Enter Project Name" />
                            <div id="project_name_fb" class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                        	<label class="col-form-label">Published Date</label>
                        	<input class="datepicker-here form-control digits" type="text" id="published_date" name="published_date" data-language="en"/>
                            <div id="published_date_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Author</label>
                            <select class="js-example-basic-multiple form-control col-sm-12" id="author" name="author[]" multiple="multiple" placeholder="Choose Author">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                    <option value="WY">Coming</option>
                                    <option value="WY">Hanry Die</option>
                                    <option value="WY">John Doe</option>
                            </select>
                            <div id="author_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Description</label>
                        	<textarea class="form-control" placeholder="Enter Description" id="description" name="description" placeholder="Enter Description of Project"></textarea>
                            <div id="description_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Slug (url)</label>
                        	<input class="form-control" type="text" id="slug" name="slug" placeholder="Enter Slug (url)" />
                            <div id="slug_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Category</label>
                            <select class="js-example-basic-multiple form-control col-sm-12" id="category_id" name="category_id[]" multiple="multiple" placeholder="Choose Category">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                    <option value="WY">Coming</option>
                                    <option value="WY">Hanry Die</option>
                                    <option value="WY">John Doe</option>
                            </select>
                            <div id="category_id_fb" class="invalid-feedback"></div>
                        </div>
                        <hr class="mt-4 mb-4" />
                        <h6>Upload Project</h6>

                        {{-- <input name="file" type="file" name="media" class="dropzone-previews dropzone"/> --}}
                        <div class="mb-3">
                            <div id="imageUpload" class="dropzone dropzone-primary">
                                <div class="dz-message needsclick">
                                    <i class="icon-cloud-up"></i>
                                    <h6>Drop files here or click to upload.</h6>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="button" class="btn btn-danger">Cancel</button>
                            <button type="submit" class="btn btn-success" id="submit" disabled="true">Submit</button>
                        </div>
					</form>
                    {{-- <hr class="mt-4 mb-4" />
                        <h6>Upload Project</h6>
                        <div class="mb-3">
                            <form class="dropzone dropzone-primary" id="uploadfile" name="uploadfile" action="/test.php">
                                <div class="dz-message needsclick">
                                    <i class="icon-cloud-up"></i>
                                    <h6>Drop files here or click to upload.</h6>
                                </div>
                            </form>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="button" class="btn btn-danger">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div> --}}
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
    {{-- <script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script> --}}
    <script>
        Dropzone.autoDiscover = false;

        $(function(){
            function validate(){
                if($("#project_name").val() != "" && $('#published_date').val() != "" && $('#author').val() != "" && $('#description').val() != "" && $('#slug').val() != ""){
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

            $("#slug").on('keyup change', function(){
                var val = $(this).val();
                if(val != ""){
                    $("#slug_fb").html("");
                    $(this).removeClass("is-invalid");
                } else {
                    $("#slug_fb").html("Url is Required");
                    $(this).addClass("is-invalid");
                }

                validate();
            });

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
            // Dropzone.options.portofolioForm = {
            // addRemoveLinks: true,
            //     autoProcessQueue: false,
            //     acceptedFiles: "image/*, video/*",
            //     uploadMultiple: true,
            //     parallelUploads: 100,
            //     maxFiles: 10,
            //     maxFilesize: 10,
            //     paramName: 'file',
            //     clickable: true,
            //     url: 'ajax.php',
            //     init: function () {
            //         var myDropzone = this;
            //         // Update selector to match your button
            //         $('#submit').click(function (e) {
            //             e.preventDefault();
            //             if ( $('#imageUpload').valid() ) {
            //                 myDropzone.processQueue();
            //             }
            //             return false;
            //         });

            //         this.on('sending', function (file, xhr, formData) {
            //             // Append all form inputs to the formData Dropzone will POST
            //             var data = $('#portofolioform').serializeArray();
            //             $.each(data, function (key, el) {
            //                 formData.append(el.name, el.value);
            //             });
            //             console.log(formData);

            //         });
            //     },
            //     error: function (file, response){
            //         if ($.type(response) === "string")
            //             var message = response; //dropzone sends it's own error messages in string
            //         else
            //             var message = response.message;
            //         file.previewElement.classList.add("dz-error");
            //         _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
            //         _results = [];
            //         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            //             node = _ref[_i];
            //             _results.push(node.textContent = message);
            //         }
            //         return _results;
            //     },
            //     successmultiple: function (file, response) {
            //         console.log(file, response);
            //         $modal.modal("show");
            //     },
            //     completemultiple: function (file, response) {
            //         console.log(file, response, "completemultiple");
            //         //$modal.modal("show");
            //     },
            //     reset: function () {
            //         console.log("resetFiles");
            //         this.removeAllFiles(true);
            //     }
            // }
            myDropzone = new Dropzone('div#imageUpload', {
                addRemoveLinks: true,
                autoProcessQueue: false,
                acceptedFiles: "image/*, video/*",
                uploadMultiple: true,
                parallelUploads: 100,
                maxFiles: 10,
                maxFilesize: 10,
                paramName: 'file',
                clickable: true,
                url: 'ajax.php',
                init: function () {
                    var myDropzone = this;
                    // Update selector to match your button
                    $('#submit').click(function (e) {
                        e.preventDefault();
                        if ( $('#imageUpload').valid() ) {
                            myDropzone.processQueue();
                        }
                        return false;
                    });

                    this.on('sending', function (file, xhr, formData) {
                        // Append all form inputs to the formData Dropzone will POST
                        var data = $('#portofolioform').serializeArray();
                        $.each(data, function (key, el) {
                            formData.append(el.name, el.value);
                        });
                        console.log(formData);

                    });
                },
                error: function (file, response){
                    if ($.type(response) === "string")
                        var message = response; //dropzone sends it's own error messages in string
                    else
                        var message = response.message;
                    file.previewElement.classList.add("dz-error");
                    _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                    _results = [];
                    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                        node = _ref[_i];
                        _results.push(node.textContent = message);
                    }
                    return _results;
                },
                successmultiple: function (file, response) {
                    console.log(file, response);
                    $modal.modal("show");
                },
                completemultiple: function (file, response) {
                    console.log(file, response, "completemultiple");
                    //$modal.modal("show");
                },
                reset: function () {
                    console.log("resetFiles");
                    this.removeAllFiles(true);
                }
            });
        //     // Dropzone.options.portofolioform = {
        //     //     maxFiles: 10,
        //     //     maxFilesize: 10,
        //     //     autoProcessQueue: false
        //     //     acceptedFiles: "jpg, jpeg, png, gif, mp4, avi, flv"
        //     //     init: function() {
        //     //         var myDropzone = this;
        //     //     }
        //     //     // accept: function(file, done) {
        //     //     //     if (file.name == "justinbieber.jpg") {
        //     //     //         done("Naha, you don't.");
        //     //     //     } else {
        //     //     //         done();
        //     //     //     }
        //     //     // }
        //     // };
        });
    </script>
	@endpush

@endsection
