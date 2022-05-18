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
				<div class="card">
					<div class="card-body">
                    <form class="theme-form mega-form">
                        <h6>Job Vacancy Information</h6>
                        <div class="mb-3">
                        	<label class="col-form-label">Title</label>
                        	<input class="form-control" type="text" placeholder="Enter Article Title" />
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Slug (url)</label>
                        	<input class="form-control" type="text" placeholder="Enter Slug (url)" />
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Thumbnail</label>
                        	<input class="form-control" type="file" placeholder="Choose JPG/PNG File" />
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Email</label>
                        	<input class="form-control" type="email" placeholder="Enter Email" />
                        </div>
                        <hr class="mt-4 mb-4" />
                        <h6>Description</h6>
                        <div class="mb-3">
                        	<textarea class="form-control" id="editor1" name="editor1"></textarea>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <button type="button" class="btn btn-danger">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
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
            ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
            console.error( error );
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
