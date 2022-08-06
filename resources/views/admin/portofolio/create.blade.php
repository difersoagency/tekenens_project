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
        <li class="breadcrumb-item active">Create Portofolio</li>
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
                    <form class="theme-form mega-form" id="portofolio-form" method="POST" action="{{route('portofolio.store')}}" enctype="multipart/form-data">
                        @csrf
                        <h6>Portofolio Information</h6>
                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Project Name</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <input class="form-control" type="text" id="project_name" name="project_name" placeholder="Enter Project Name"/>
                                <div id="project_name_fb" class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Published Date</label>
                            <div class="col-lg-4 col-md-6 col-sm-8">
                                <input class="datepicker-here form-control digits" type="text" id="published_date" name="published_date" data-language="en"/>
                                <div id="published_date_fb" class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-form-label col-12">Author</label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <select class="js-example-basic-multiple form-control col-sm-12" id="author" name="team_id[]" multiple="multiple" placeholder="Choose Author">
                                    @foreach($t as $ts)
                                        <option value="{{$ts->id}}">{{$ts->name}}</option>
                                    @endforeach
                                </select>
                                <div id="author_fb" class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-form-label col-12">Category</label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <select class="js-example-basic-multiple form-control col-sm-12" id="category_id" name="category_id[]" multiple="multiple" placeholder="Choose Category">
                                    @foreach($c as $cs)
                                        <option value="{{$cs->id}}">{{$cs->name}}</option>
                                    @endforeach
                                </select>
                                <div id="category_id_fb" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Description</label>
                        	<textarea class="form-control" placeholder="Enter Description" id="description" name="description" placeholder="Enter Description of Project"></textarea>
                            <div id="description_fb" class="invalid-feedback"></div>
                        </div>

                        <hr class="mt-4 mb-4" />
                        <h6>Web Information</h6>
                        <div class="mb-3">
                        	<label class="col-form-label">Status</label>
                            <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                <div class="radio radio-primary">
                                    <input id="radioinline1" type="radio" name="status" value="1" >
                                    <label class="mb-0" for="radioinline1">Available</label>
                                </div>
                                <div class="radio radio-primary">
                                    <input id="radioinline2" type="radio" name="status" value="0" checked>
                                    <label class="mb-0" for="radioinline2">Not Available</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Slug (url)</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <input class="form-control" type="text" id="slug" name="slug" placeholder="Enter Slug (url)" />
                                <div id="slug_fb" class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label">Upload Portofolio</label>
                            <div class="table-responsive">
                                <table class="table align-center" id="pictable">
                                    <thead>
                                        <tr><th colspan="4"><button type="button" class="btn btn-outline-primary btn-sm pull-right" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" id="add_porto"><i class="fa fa-plus"></i> Add Portofolio Image</button></th></tr>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th width="60%">Image</th>
                                            <th width="20%">Status</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="4">No data currently available</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        

                        <!-- <div class="mb-3">
                            <label class="col-form-label">Upload Portofolio</label>
                            <div id="imageUpload" class="dropzone dropzone-primary">
                                <div class="dz-message needsclick" id="image-upload-file">
                                    <i class="icon-cloud-up"></i>
                                    <h6>Drop files here or click to upload.</h6>
                                </div>
                            </div>
                            <div id="imageportofolio" hidden="true"></div>
                        </div> -->


                        <div class="mt-4 d-flex justify-content-between">
                            <a type="button" class="btn btn-danger" href="{{route('portofolio.show')}}">Cancel</a>
                            <button type="submit" class="btn btn-success" id="submit">Submit</button>
                        </div>
					</form>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Add Portofolio Image</h4>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form enctype="multipart/form-data" id="modal_form_id"  method="POST">
                                    <div class="modal-body">
                                        
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Picture:</label>
                                                <input class="form-control" type="file" id="add_picture" name="add_picture">
                                                <img id="photoPreview" style="width:50%; height: auto" class="mt-1" @if(isset($p->media)) src="{{asset('storage/images/about/'.$p->media)}}" @endif/>
                                                <div id="photo_fb" class="invalid-feedback"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="message-text">Status:</label>
                                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                                <div class="radio radio-primary">
                                                    <input id="add_status1" type="radio" name="add_status" value="draft">
                                                    <label class="mb-0" for="add_status1">Draft</label>
                                                </div>
                                                <div class="radio radio-primary">
                                                    <input id="add_status2" type="radio" name="add_status" value="sketch">
                                                    <label class="mb-0" for="add_status2">Sketch</label>
                                                </div>
                                                <div class="radio radio-primary">
                                                    <input id="add_status3" type="radio" name="add_status" value="final">
                                                    <label class="mb-0" for="add_status3">Final Result</label>
                                                </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" type="button" id="btnadd" disabled="true">Add Picture</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
    <script>
        Dropzone.autoDiscover = false;

        $(function(){
            function validasiformpic(){
                if($('#add_picture').val() != "" && !$('#add_picture').hasClass('is-invalid') && $('#add_status').val() != ""){
                    $('#btnadd').attr('disabled', false);
                }
                else{
                    $('#btnadd').attr('disabled', true);
                }
            }

            function readURL(input) {
                if (input.files && input.files[0]) {
                    if(input.files[0].size <= 5000000){
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#photoPreview').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                    else{
                        $('#photoPreview').attr('src', "");
                    }
                }
                else{
                    $('#photoPreview').attr('src', "");
                }
            }
            $(document).on('change', '#add_picture', function(){
                readURL(this);
                for(var i=0; i< $(this).get(0).files.length; ++i){
                    var file1 = $(this).get(0).files[i].size;
                    if(file1){
                        var file_size = $(this).get(0).files[i].size;
                        if(file_size > 5000000){
                            $('#photoPreview').attr('src', "");
                            $('#photo_fb').html("File photo size is larger than 5MB");
                            $('#add_picture').addClass('is-invalid');
                        }else{
                            $('#photo_fb').html("");
                            $('#add_picture').removeClass('is-invalid');
                        }
                    }
                }

                validasiformpic();
            });

            $(document).on('change', '#add_status', function(){
                validasiformpic();
            });

            $(document).on('click', "#btnadd", function(){
                var postData = new FormData($("#modal_form_id")[0]);
                $.ajax({
                    type:'POST',
                    url:'{{ route("portofolio.storeMedia") }}',
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data : postData,
                    success:function(data){
                        var pictableform = $('#pictable').find('#removerow').length;
                        if(pictableform <= 0){
                            $('tbody tr').remove();
                        }
                        $('#pictable tbody').append(`<tr>
                            <td>1</td>
                            <td> <img id="pic_preview" style="width:50%; height: auto" class="mt-1" src="{{asset('storage/images/tmp/')}}`+`/`+data.name+`"/><input type="text" id="image" name="image[]" hidden="true" value="`+data.name+`"/></td>
                            <td>`+ data.status +`<input type="text" id="image_status" name="photo[]" hidden="true" value="`+data.status+`"/></td>
                            <td><button type="button" id="removerow" class="btn btn-sm "><i class="fa fa-minus text-danger"></button></td>
                        </tr>`);
                        numberRows($("#pictable"));
                    },
                    complete:function(){
                        $('.bd-example-modal-lg').modal('hide');
                    }
                });
                
            })

            function numberRows($t) {
                var c = 0 - 2;
                $t.find("tr").each(function(ind, el) {
                    $(el).find("td:eq(0)").html(++c);
                    var j = c - 1;
                    // $(el).find('.jumlah').attr('name', 'jumlah[' + j + ']');
                    // $(el).find('.jumlah').attr('id', 'jumlah' + j);
                });
            }

            $('#pictable').on('click', '#removerow', function(e) {
                $(this).closest('tr').remove();
                numberRows($("#pictable"));
            });
            
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
                },
                removedfile: function(file) {
                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
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
                }
            });
        });
    </script>
	@endpush

@endsection
