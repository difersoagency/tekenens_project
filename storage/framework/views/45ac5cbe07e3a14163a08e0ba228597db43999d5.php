<?php $__env->startSection('title'); ?>Teams
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Teams</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item active">Teams</li>
	<?php if (isset($__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0)): ?>
<?php $component = $__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0; ?>
<?php unset($__componentOriginal04b5c99f4b0ecb1ac8b6cea23cbf13f14c9909f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

    <div class="container-fluid user-card">
	    <div class="row">
	        <div class="col-md-2 col-lg-2 col-xl-2 box-col-2">
	            <div class="card custom-card">
                    <a class="btn btn-primary" type="button" href="<?php echo e(route('team.create')); ?>">Create</a>
	            </div>
	        </div>
	    </div>
	</div>


    <div class="container-fluid user-card">
	    <div class="row">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
	            <div class="card custom-card">
                    <div class="card-profile">
                        <?php if($d->path): ?>
                        <img class="rounded-circle"   src="<?php echo e(asset('storage/'. substr($d->path,7))); ?>"  alt="" />
                        <?php else: ?>
                        <img class="rounded-circle"   src="<?php echo e(asset('assets/images/dashboard/1.png')); ?>"  alt="" />
                        <?php endif; ?>
                    </div>
	                <div class="text-center profile-details">
	                   <h4><?php echo e($d->name); ?></h4>
	                    <h6><?php echo e($d->role); ?></h6>
	                </div>
	                <div class="card-footer row">
	                    <div class="col-6 col-sm-6">
                            <a href="<?php echo e(route('team.edit',$d->id)); ?>" class="btn btn-primary" type="button">Edit</a>
	                    </div>
	                    <div class="col-6 col-sm-6">
                            <button class="btn btn-danger" type="button">Delete</button>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\P\theme\resources\views/admin/team/show.blade.php ENDPATH**/ ?>