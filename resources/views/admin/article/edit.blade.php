@extends('layouts.admin.master')

@section('title')Article
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/summernote.css')}}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Edit Article</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('article.show')}}">Article</a></li>
        <li class="breadcrumb-item active">Edit Article</li>
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
                    <form class="theme-form mega-form" method="POST" action="{{route('article.update', ['id' => $id])}}" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                        <h6>Article Information</h6>
                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Title</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <input class="form-control" type="text" id="title" name="title" placeholder="Enter Article Title" value="{{$a->title}}"/>
                                <div id="title_fb" class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                        	<label class="col-form-label">Summary</label>
                        	<textarea class="form-control" placeholder="Enter Summary" id="summary" name="summary">{{$a->meta_desc}}</textarea>
                            <div id="summary_fb" class="invalid-feedback"></div>
                        </div>

                        <?php $arr = explode(',', $a->Category->implode('id', ','));?>
                        <div class="mb-3 row">
                            <label class="col-form-label col-12">Category</label>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <select class="js-example-basic-multiple col-sm-12" multiple="multiple" id="category_id" name="category_id[]">
                                    @foreach($c as $cs)
                                        <option value="{{$cs->id}}" @if(in_array($cs->id, $arr)) selected @endif>{{$cs->name}}</option>
                                    @endforeach
                                </select>
                                <div id="title_fb" class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Thumbnail</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <input class="form-control" type="file" id="thumbnail" name="thumbnail" placeholder="Choose JPG/PNG File" accept="image/png, image/jpeg, image/jpg" value="{{$a->og_image}}"/>
                                <img id="uploadPreview" style="width: 50%; height: auto" src="{{asset('storage/images/article')}}/{{$a->og_image}}" class="mt-1"/>
                                <div id="thumbnail_fb" class="invalid-feedback"></div>
                            </div>
                        </div>


                        <hr class="mt-4 mb-4" />
                        <h6>Web Information</h6>
                        <div class="mb-3">
                        	<label class="col-form-label">Status</label>
                            <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                <div class="radio radio-primary">
                                    <input id="radioinline1" type="radio" name="status" value="1" @if($a->status == "1") checked @endif>
                                    <label class="mb-0" for="radioinline1">Available</label>
                                </div>
                                <div class="radio radio-primary">
                                    <input id="radioinline2" type="radio" name="status" value="0" @if($a->status == "0") checked @endif>
                                    <label class="mb-0" for="radioinline2">Not Available</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                        	<label class="col-form-label col-12">Slug (url)</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <input class="form-control" type="text" id="slug" name="slug" placeholder="Enter Slug (url)" value="{{$a->slug}}"/>
                                <div id="slug_fb" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Content</label>
                        	<textarea class="form-control" id="editor1" name="content">{{$a->content}}</textarea>
                            <div id="content_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="button" class="btn btn-danger">Cancel</button>
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
            // ClassicEditor
            // .create( document.querySelector( '#content' ) )
            // .catch( error => {
            //     console.error( error );
            // });

            function validate(){
                if($('#title').val() != "" && $('#summary').val() != "" && (!$('#slug').hasClass('is-invalid') && $('#slug').val() != "") && $('#category_id').val() != "" && (!$('#thumbnail').hasClass('is-invalid'))){
                    $('#submit').removeAttr('disabled');
                } else {
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

            $("#thumbnail").change(function(){
                readURL(this);
                for(var i=0; i< $(this).get(0).files.length; ++i){
                    var file1 = $(this).get(0).files[i].size;
                    if(file1){
                        var file_size = $(this).get(0).files[i].size;
                        if(file_size > 5000000){
                            $('#thumbnail_fb').html("File upload size is larger than 2MB");
                            $('#thumbnail').addClass('is-invalid');
                            $('#uploadPreview').attr('src', '');
                        }else{
                            $('#thumbnail_fb').html("");
                            $('#thumbnail').removeClass('is-invalid');
                        }
                    }
                }
                validate();
            });

            $('#title').on('keyup change', function(){
                if($(this).val() != ""){
                    $('#title_fb').html("");
                    $(this).removeClass('is-invalid');
                }else{
                    $('#title_fb').html("Title is Required");
                    $(this).addClass('is-invalid');
                }

                validate();
            });

            $('#summary').on('keyup change', function(){
                if($(this).val() != ""){
                    $('#summary_fb').html("");
                    $(this).removeClass('is-invalid');
                }else{
                    $('#summary_fb').html("Summary is Required");
                    $(this).addClass('is-invalid');
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

            $('#category_id').on('keyup change', function(){
                if($(this).val() != ""){
                    $('#category_id_fb').html("");
                    $(this).removeClass('is-invalid');
                }else{
                    $('#category_id_fb').html("Category is Required");
                    $(this).addClass('is-invalid');
                }

                validate();
            });

            $('#editor1').on('keyup change', function(){
                if($(this).val() != ""){
                    $('#content_fb').html("");
                    $(this).removeClass('is-invalid');
                }else{
                    $('#content_fb').html("Content is Required");
                    $(this).addClass('is-invalid');
                }

                validate();
            });

            // tinymce.init({
            //     selector: 'textarea#content', // Replace this CSS selector to match the placeholder element for TinyMCE
            //     plugins: 'code table lists image',
            //     toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
            //     image_title: true,
            //     /* enable automatic uploads of images represented by blob or data URIs*/
            //     automatic_uploads: true,
            //     /*
            //         URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
            //         images_upload_url: 'postAcceptor.php',
            //         here we add custom filepicker only to Image dialog
            //     */
            //     file_picker_types: 'image',
            //     /* and here's our custom image picker*/
            //     file_picker_callback: function (cb, value, meta) {
            //         var input = document.createElement('input');
            //         input.setAttribute('type', 'file');
            //         input.setAttribute('accept', 'image/*');

            //         /*
            //         Note: In modern browsers input[type="file"] is functional without
            //         even adding it to the DOM, but that might not be the case in some older
            //         or quirky browsers like IE, so you might want to add it to the DOM
            //         just in case, and visually hide it. And do not forget do remove it
            //         once you do not need it anymore.
            //         */

            //         input.onchange = function () {
            //         var file = this.files[0];

            //         var reader = new FileReader();
            //         reader.onload = function () {
            //             /*
            //             Note: Now we need to register the blob in TinyMCEs image blob
            //             registry. In the next release this part hopefully won't be
            //             necessary, as we are looking to handle it internally.
            //             */
            //             var id = 'blobid' + (new Date()).getTime();
            //             var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            //             var base64 = reader.result.split(',')[1];
            //             var blobInfo = blobCache.create(id, file, base64);
            //             blobCache.add(blobInfo);

            //             /* call the callback and populate the Title field with the file name */
            //             cb(blobInfo.blobUri(), { title: file.name });
            //         };
            //         reader.readAsDataURL(file);
            //         };

            //         input.click();
            //     },
            //     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            // });
        });
    </script>
	@endpush

@endsection
