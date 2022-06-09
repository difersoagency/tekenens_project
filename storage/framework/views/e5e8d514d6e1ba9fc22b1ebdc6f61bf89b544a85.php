

<?php $__env->startSection('title'); ?>Home Description
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/summernote.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3>Home</h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('home.show')); ?>">Home</a></li>
        <li class="breadcrumb-item active">Create Home Description</li>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
                <?php if(Session::has('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo e(Session::get('error')); ?>

                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php endif; ?>
                <?php if(Session::has('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo e(Session::get('success')); ?>

                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php endif; ?>
				<div class="card">
					<div class="card-body">
                    <form class="theme-form mega-form" method="POST" action="<?php echo e(route('home.description.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <h6>Home Description</h6>
                        <div class="mb-3">
                        	<label class="col-form-label">Title</label>
                        	<input class="form-control" type="text" name="title" id="title" placeholder="Enter Description Title" />
                            <div id="title_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Image</label>
                        	<input class="form-control" type="file"  name="thumbnail" id="thumbnail" placeholder="Choose JPG/PNG File" accept="image/png, image/jpeg, image/jpg"/>
                            <div id="thumbnail_fb" class="invalid-feedback"></div>
                        </div>
                        <hr class="mt-4 mb-4" />
                        <h6>Description</h6>
                        <div class="mb-3">
                        	<textarea class="form-control" id="editor1" name="content"></textarea>
                            <div id="content_fb" class="invalid-feedback"></div>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <a type="button" class="btn btn-danger" href="<?php echo e(route('home.show')); ?>">Cancel</a>
                            <button type="submit" class="btn btn-success" id="submit">Submit</button>
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
            $('#submit').attr('disabled', true);
            function validate(){
                if($('#title').val() != "" && (!$('#thumbnail').hasClass('is-invalid') && $('#thumbnail').val() != "")){
                    $('#submit').removeAttr('disabled');
                }else{
                    $('#submit').attr('disabled', true);
                }
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
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tekenens_project\resources\views/admin/home/description/create.blade.php ENDPATH**/ ?>