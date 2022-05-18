<?php $__env->startSection('title'); ?>Users
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Users</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item active">Users</li>
	<?php if (isset($__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0)): ?>
<?php $component = $__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0; ?>
<?php unset($__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

    <div class="container-fluid user-card">
	    <div class="row">
	        <div class="col-md-2 col-lg-2 col-xl-2 box-col-2">
	            <div class="card custom-card">
                    <button class="btn btn-primary" type="button">Create</button>
	            </div>
	        </div>
	    </div>
	</div>


    <div class="container-fluid user-card">
	    <div class="row">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
	            <div class="card custom-card">

	                <div class="text-center profile-details">
	                    <a href="#"> <h4>Mark Jecno</h4></a>
	                    <h6>Manager</h6>
	                </div>
	                <div class="card-footer row">
	                    <div class="col-6 col-sm-6">
                            <button class="btn btn-primary" type="button">Edit</button>
	                    </div>
	                    <div class="col-6 col-sm-6">
                            <button class="btn btn-primary" type="button">Delete</button>
	                    </div>
	                </div>
	            </div>
	        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </div>
	</div>


	<?php $__env->startPush('scripts'); ?>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\P\theme\resources\views/admin/user/show.blade.php ENDPATH**/ ?>