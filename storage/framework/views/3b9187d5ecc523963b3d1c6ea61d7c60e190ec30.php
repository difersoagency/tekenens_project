

<?php $__env->startSection('title'); ?>Job Vacancy
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/summernote.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3>Job Vacancy</h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('job_vacancy.show')); ?>">Job Vacancy</a></li>
        <li class="breadcrumb-item active">Create Job Vacancy</li>
    <?php if (isset($__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0)): ?>
<?php $component = $__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0; ?>
<?php unset($__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
                    <form class="theme-form mega-form" method="POST" action="<?php echo e(route('job_vacancy.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <h6>Job Vacancy Information</h6>
                        <div class="mb-3">
                        	<label class="col-form-label">Title</label>
                        	<input class="form-control" type="text" name="title" id="title" placeholder="Enter Article Title" />
                            <div id="title_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Slug (url)</label>
                        	<input class="form-control" type="text"  name="slug" id="slug" placeholder="Enter Slug (url)" />
                            <div id="slug_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Thumbnail</label>
                        	<input class="form-control" type="file"  name="thumbnail" id="thumbnail" placeholder="Choose JPG/PNG File" accept="image/png, image/jpeg, image/jpg"/>
                            <div id="thumbnail_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Email</label>
                        	<input class="form-control" type="email" name="email" id="email" placeholder="Enter Email" />
                            <div id="email_fb" class="invalid-feedback"></div>
                        </div>
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
                        <hr class="mt-4 mb-4" />
                        <h6>Description of Job</h6>
                        <div class="mb-3">
                        	<textarea class="form-control" id="editor1" name="content"></textarea>
                            <div id="content_fb" class="invalid-feedback"></div>
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

    <?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/bootstrap/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/editor/ckeditor/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/editor/ckeditor/adapters/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/editor/ckeditor/styles.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/editor/ckeditor/ckeditor.custom.js')); ?>"></script>
    <script>
        $(function(){
            // ClassicEditor
            //     .create( document.querySelector( '#content' ) )
            //     .catch( error => {
            //     console.error( error );
            // });

            function validate(){
                // if($('#title').val() != "" && $('#slug').val() != "" && !$('#thumbnail').hasClass('is-invalid') && $('#email').val() != "" && $('#content').val() != ""){
                //     $('#submit').removeAttr('disabled');
                // }else{
                //     $('#submit').attr('disabled', true);
                // }
            }

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
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
            })

            $('#slug').on("keyup change", function(){
                if($(this).val() != ""){
                    $('#slug_fb').html("");
                    $(this).removeClass("is-invalid");
                }else{
                    $('#slug_fb').html("Slug is Required");
                    $(this).addClass("is-invalid");
                }
            })

            $('#email').on("keyup change", function(){
                if($(this).val() != ""){
                    $('#email_fb').html("");
                    $(this).removeClass("is-invalid");
                }else{
                    $('#email_fb').html("Email is Required");
                    $(this).addClass("is-invalid");
                }
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
            });

            $('#content').on("keyup change", function(){
                if($(this).val() != ""){
                    $('#content_fb').html("");
                    $(this).removeClass("is-invalid");
                }else{
                    $('#content_fb').html("Description of Job is Required");
                    $(this).addClass("is-invalid");
                }
            })

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
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\P\theme\resources\views/admin/job_vacancy/create.blade.php ENDPATH**/ ?>