

<?php $__env->startSection('title'); ?>Contact
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Contact</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item active">Contact</li>
	<?php echo $__env->renderComponent(); ?>
     <div class="container-fluid">
            <div class="row">
                <?php if(Session::has('error')  ): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo e(Session::get('error')); ?>

                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>
                <?php if(Session::has('success')  ): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo e(Session::get('success')); ?>

                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>

              <div class="col-sm-12 col-lg-6 col-xl-8 xl-50 col-md-12 box-col-6">
                <div class="card height-equal">
                    <div class="contact-form card-body">
                    <form action="<?php echo e(route('update.contact',$data->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                            <div class="mb-3">
                                <label for="exampleInputName">Description</label>
                                <textarea class="form-control textarea" rows="3" cols="50" placeholder="Office Address" name="description"><?php echo e($data->description); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputName">Address</label>
                                <textarea class="form-control textarea" rows="3" cols="50" placeholder="Office Address" name="address"><?php echo e($data->address); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="exampleInputEmail1">Email</label>
                                <input class="form-control" id="exampleInputEmail1" type="email" name="email" placeholder="Demo@gmail.com" value="<?php echo e($data->email); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="exampleInputEmail1">Whatsapp</label>
                                <input class="form-control" id="exampleInputEmail1" type="number" name="whatsapp" placeholder="08123456789" value="<?php echo e($data->whatsapp); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="exampleInputEmail1">Instagram</label>
                                <input class="form-control" id="exampleInputEmail1" type="text" name="instagram" placeholder="ID Instagram" value="<?php echo e($data->instagram); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="exampleInputEmail1">Youtube</label>
                                <input class="form-control" id="exampleInputEmail1" type="text" name="youtube" placeholder="Youtube Channel" value="<?php echo e($data->youtube); ?>">
                            </div>
                            <div class="text-sm-end">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>




            </div>
        </div>


	<?php $__env->startPush('scripts'); ?>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Diverso\wisnu\resources\views/admin/contact/show.blade.php ENDPATH**/ ?>