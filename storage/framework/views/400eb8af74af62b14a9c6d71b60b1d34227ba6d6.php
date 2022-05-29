

<?php $__env->startSection('title'); ?>Portofolio
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/date-picker.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/dropzone.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3>Portofolio</h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item"><a href="<?php echo e(route('portofolio.show')); ?>">Portofolio</a></li>
        <li class="breadcrumb-item active">Create Portofolio</li>
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
                    <form class="theme-form mega-form">
                        <h6>Portofolio Information</h6>
                        <div class="mb-3">
                        	<label class="col-form-label">Project Name</label>
                        	<input class="form-control" type="text" id="project_name" placeholder="Enter Project Name" />
                        </div>

                        <div class="mb-3">
                        	<label class="col-form-label">Published Date</label>
                        	<input class="datepicker-here form-control digits" type="text" data-language="en"/>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Author</label>
                            <select class="js-example-basic-multiple form-control col-sm-12" id="author" name="author" multiple="multiple" placeholder="Choose Author">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                    <option value="WY">Coming</option>
                                    <option value="WY">Hanry Die</option>
                                    <option value="WY">John Doe</option>
                                </select>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Description</label>
                        	<textarea class="form-control" placeholder="Enter Description" id="description" name="description"/></textarea>
                        </div>
                        <div class="mb-3">
                        	<label class="col-form-label">Slug (url)</label>
                        	<input class="form-control" type="text" id="slug" name="slug" placeholder="Enter Slug (url)" />
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
                        </div>

					</form>
                    <hr class="mt-4 mb-4" />
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
                        </div>
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
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dropzone/dropzone.js')); ?>"></script>
    
    <script>
        $(function(){
            Dropzone.options.uploadfile = {
                paramName: "file",
                maxFiles: 10,
                maxFilesize: 10,
                autoProcessQueue: false
                acceptedFiles: "jpg, jpeg, png, gif, mp4, avi, flv"
                // accept: function(file, done) {
                //     if (file.name == "justinbieber.jpg") {
                //         done("Naha, you don't.");
                //     } else {
                //         done();
                //     }
                // }
            };
        });
    </script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\P\theme\resources\views/admin/portofolio/create.blade.php ENDPATH**/ ?>