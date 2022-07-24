

<?php $__env->startSection('title'); ?>Forget Password
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/sweetalert2.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
	    <div class="container-fluid p-0">
	        <div class="row m-0">
	            <div class="col-12 p-0">
	                <div class="login-card">
	                    <div class="login-main">
                            <div  class="theme-form login-form">
                            <?php if(Session::has('success')  ): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert"><?php echo e(Session::get('success')); ?>

                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                          <?php endif; ?>

                            <?php if(Session::has('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo e(Session::get('error')); ?>

                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                          <?php endif; ?>
                            <?php if(Session::has('duplicate')): ?>
                            <div class="alert alert-info alert-dismissible fade show" role="alert"><?php echo e(Session::get('duplicate')); ?>

                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                          <?php endif; ?>
	                        <form action="<?php echo e(route('forget_pwd.post')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
	                            <h4 class="mb-3">Reset Your Password</h4>
	                            <div class="form-group">
	                                <label>Enter your email address below to reset password</label>
	                                <div class="row">
	                                    <div class="col-12 col-sm-12">
	                                        <input class="form-control" type="text" placeholder="Email address" name="email" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <button class="btn btn-primary btn-block" type="submit">Send</button>
	                            </div>

	                            <p>Already have an password?<a class="ms-2" href="<?php echo e(route('login')); ?>">Sign in</a></p>
	                        </form>
	                    </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Diverso\wisnu\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>