

<?php $__env->startSection('title'); ?>Reset Password
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
	                    <form class="theme-form login-form" method="POST" action="<?php echo e(route('forget_pwd.reset')); ?>">
                            <?php echo csrf_field(); ?>
	                        <h4 class="mb-3">Reset Your Password</h4>
	                        <div class="form-group">
	                            <label>Email</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-email"></i></span>
	                                <input class="form-control" type="text" name="email" required="" placeholder="Your email address" />
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>New Password</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i class="icon-lock"></i></span>
	                                <input class="form-control" type="password" name="password" required="" placeholder="*********" />
	                                <div class="show-hide"><span class="show"></span></div>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Confirm Password</label>
	                            <div class="input-group">
                                    <input type="form-control d-none" name="token" value="<?php echo e($token); ?>" hidden>
	                                <span class="input-group-text"><i class="icon-lock"></i></span>
	                                <input class="form-control" type="password" name="password_confirmation" required="" placeholder="*********" />
	                            </div>
	                        </div>
	                     
	                        <div class="form-group">
	                            <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

    <?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/sweet-alert/sweetalert.min.js')); ?>"></script>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Diverso\p_web\resources\views/auth/passwords/confirm.blade.php ENDPATH**/ ?>