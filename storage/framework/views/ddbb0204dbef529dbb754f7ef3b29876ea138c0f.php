

<?php $__env->startSection('title'); ?>Login
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="login-card">
                    <div  class="theme-form login-form">
                        
                        
                        <?php if(Session::has('error')  ): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo e(Session::get('error')); ?>

                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      <?php endif; ?>
                        <?php if(Session::has('logout')  ): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo e(Session::get('logout')); ?>

                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      <?php endif; ?>
                        <?php if(Session::has('change_pwd')  ): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo e(Session::get('change_pwd')); ?>

                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <h4>Login</h4>
                        <h6>Welcome back! Log in to your account.</h6>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-email"></i></span>
                                <input class="form-control" type="email" required="" name="email" placeholder="Your email address" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-lock"></i></span>
                                <input class="form-control" type="password" name="password" required="" placeholder="*********" />
                                <div class="show-hide"><span class="show"> </span></div>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div class="checkbox">
                                
                            </div>
                            <a class="link" href="<?php echo e(route('forget_pwd.show')); ?>">Forgot password?</a>
                        </div>
                        <div class="form-group ">
                            <button class="btn btn-primary btn-block float-right" type="submit">Sign In</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <?php $__env->startPush('scripts'); ?>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tekenens_main\resources\views/auth/login.blade.php ENDPATH**/ ?>