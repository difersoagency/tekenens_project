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
            <h3>Article</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{route('article.show')}}">Article</a></li>
        <li class="breadcrumb-item active">Create Article</li>
    @endcomponent

    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
                    <form class="theme-form mega-form" action="POST" url="{{route('article.store')}}" enctype="multipart/form-data">
                        <h6>Article Information</h6>
                        <div class="mb-3">
                        	<label class="col-form-label">Title</label>
                        	<input class="form-control" type="text" id="title" name="title" placeholder="Enter Article Title" />
                            <div id="title_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Meta Description (Summary)</label>
                        	<textarea class="form-control" placeholder="Enter Meta Description / Summary" id="summary" name="summary"></textarea>
                            <div id="summary_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Slug (url)</label>
                        	<input class="form-control" type="text" id="slug" name="slug" placeholder="Enter Slug (url)" />
                            <div id="slug_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Thumbnail</label>
                        	<input class="form-control" type="file" id="thumbnail" name="thumbnail" placeholder="Choose JPG/PNG File" accept="image/png, image/jpeg, image/jpg"/>
                            <img id="uploadPreview" style="width: 10%; height: auto" />
                            <div id="thumbnail_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Category</label>
                            <select class="js-example-basic-multiple col-sm-12" multiple="multiple" id="category_id" name="category_id">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                    <option value="WY">Coming</option>
                                    <option value="WY">Hanry Die</option>
                                    <option value="WY">John Doe</option>
                            </select>
                            <div id="title_fb" class="invalid-feedback"></div>
                        </div>
                        <hr class="mt-4 mb-4" />
                        <h6>Content</h6>
                        <div class="mb-3">
                        	<textarea class="form-control" id="editor1" name="content"></textarea>
                            <div id="content_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="button" class="btn btn-danger">Cancel</button>
                            <button type="submit" class="btn btn-success" disabled="true">Submit</button>
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
                if($('#title').val() != "" && $('#summary').val() != "" && $('#slug').val() != "" && $('#category_id').val() != "" && $('#editor1').val() != ""){
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
            }

            $("#thumbnail").change(function(){
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

            $('#slug').on('keyup change', function(){
                if($(this).val() != ""){
                    $('#slug_fb').html("");
                    $(this).removeClass('is-invalid');
                }else{
                    $('#slug_fb').html("Slug is Required");
                    $(this).addClass('is-invalid');
                }

                validate();
            });

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
                alert("tes");
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
