

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
                <div class="col-sm-6 col-xl-3 xl-50 col-lg-6 box-col-6">
                    <div class="card social-widget-card">
                          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <a class="setting-primary" id="edit_email" type="button" ><i class="fa fa-pencil-square-o"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <div class="card-body">
                            <div class="redial-social-widget"><i class="fa fa-envelope font-primary"></i></div>
                            <h5 class="b-b-light">Email</h5>
                            <div class="row">
                                <div class="col text-center b-r-light">
                                    <div id ="show_email_form">
                                    <h4 class="counter mb-0"><?php echo e($data->email); ?></h4>
                                    </div>
                                    <div id ="edit_email_form" class="d-none" >
                                    <form action="<?php echo e(route('update.contact',['type'=> 'email','id' => $data->id ])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo e(method_field('PUT')); ?>

                                        <input class="form-control" type="email" name="email" data-original-value="<?php echo e($data->email); ?>" id="email" value="<?php echo e($data->email); ?>" />
                                    <br>
                                    <button class="btn btn-secondary" type="submit" id="submit_email">Update</button>
                                    <button class="btn btn-primary" type="button"  id="cancel_email" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 xl-50 col-lg-6 box-col-6">
                    <div class="card social-widget-card">
                          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <a class="setting-primary" id="edit_phone_number" type="button" ><i class="fa fa-pencil-square-o"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <div class="card-body">
                            <div class="redial-social-widget"><i class="fa fa-whatsapp font-primary"></i></div>
                            <h5 class="b-b-light">Phone</h5>
                            <div class="row">
                                <div class="col text-center b-r-light">
                                    <div id ="show_phone_number_form">
                                    <h4 class="counter mb-0"><?php echo e($data->phone_number); ?></h4>
                                    </div>
                                    <div id ="edit_phone_number_form" class="d-none" >
                                    <form action="<?php echo e(route('update.contact',['type'=> 'phone_number','id' => $data->id ])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo e(method_field('PUT')); ?>

                                        <input class="form-control" type="number" name="phone_number" data-original-value="<?php echo e($data->phone_number); ?>" id="phone_number" value="<?php echo e($data->phone_number); ?>" />
                                    <br>
                                    <button class="btn btn-secondary" type="submit" id="submit_phone_number">Update</button>
                                    <button class="btn btn-primary" type="button"  id="cancel_phone_number" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 xl-50 col-lg-6 box-col-6">
                    <div class="card social-widget-card">
                          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <a class="setting-primary" id="edit_instagram" type="button" ><i class="fa fa-pencil-square-o"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <div class="card-body">
                            <div class="redial-social-widget"><i class="fa fa-instagram font-primary"></i></div>
                            <h5 class="b-b-light">INSTAGRAM</h5>
                            <div class="row">
                                <div class="col text-center b-r-light">
                                    <div id ="show_instagram_form">
                                    <h4 class="counter mb-0"><?php echo e($data->instagram); ?></h4>
                                    </div>
                                    <div id ="edit_instagram_form" class="d-none" >
                                    <form action="<?php echo e(route('update.contact',['type'=> 'instagram','id' => $data->id ])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo e(method_field('PUT')); ?>

                                        <input class="form-control" type="text" name="instagram" data-original-value="<?php echo e($data->instagram); ?>" id="instagram" value="<?php echo e($data->instagram); ?>" />
                                    <br>
                                    <button class="btn btn-secondary" type="submit" id="submit_instagram">Update</button>
                                    <button class="btn btn-primary" type="button"  id="cancel_instagram" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                


                <div class="col-sm-6 col-xl-3 xl-50 col-lg-6 box-col-6">
                    <div class="card social-widget-card">
                          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <a class="setting-primary" id="edit_address" type="button" ><i class="fa fa-pencil-square-o"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <div class="card-body">
                            <div class="redial-social-widget"><i class="fa fa-map-marker font-primary"></i></div>
                            <h5 class="b-b-light">Address</h5>
                            <div class="row">
                                <div class="col text-center b-r-light">
                                    <div id ="show_address_form">
                                    <h4 class="counter mb-0"><?php echo e($data->address); ?></h4>
                                    </div>
                                    <div id ="edit_address_form" class="d-none" >
                                    <form action="<?php echo e(route('update.contact',['type'=> 'address','id' => $data->id ])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo e(method_field('PUT')); ?>

                                        <input class="form-control" type="text" name="address" data-original-value="<?php echo e($data->address); ?>" id="address" value="<?php echo e($data->address); ?>" />
                                    <br>
                                    <button class="btn btn-secondary" type="submit" id="submit_address">Update</button>
                                    <button class="btn btn-primary" type="button"  id="cancel_address" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


	<?php $__env->startPush('scripts'); ?>
<script>
        $(document).ready(function () {
            $('#edit_email').on('click', function() {
                $("#edit_email_form").removeClass('d-none');
                $("#show_email_form").addClass('d-none');
            });
            $('#cancel_email').on('click', function() {
                var email_restore = $("#email");
                $("#edit_email_form").addClass('d-none');
                $("#show_email_form").removeClass('d-none');
                email_restore.val(email_restore.data("original-value"));
            });

            $('#email').on('keyup change', function() {
            if ($(this).val() != '') {
                    $('#submit_email').attr("disabled", false);
            } else {
                $('#submit_email').attr("disabled", true);
            }
           });



           $('#edit_instagram').on('click', function() {
                $("#edit_instagram_form").removeClass('d-none');
                $("#show_instagram_form").addClass('d-none');
            });
            $('#cancel_instagram').on('click', function() {
                var instagram_restore = $("#instagram");
                $("#edit_instagram_form").addClass('d-none');
                $("#show_instagram_form").removeClass('d-none');
                instagram_restore.val(instagram_restore.data("original-value"));
            });

            $('#instagram').on('keyup change', function() {
            if ($(this).val() != '') {
                    $('#submit_instagram').attr("disabled", false);
            } else {
                $('#submit_instagram').attr("disabled", true);
            }
           });


           $('#edit_phone_number').on('click', function() {
                $("#edit_phone_number_form").removeClass('d-none');
                $("#show_phone_number_form").addClass('d-none');
            });
            $('#cancel_phone_number').on('click', function() {
                var phone_number_restore = $("#phone_number");
                $("#edit_phone_number_form").addClass('d-none');
                $("#show_phone_number_form").removeClass('d-none');
                phone_number_restore.val(phone_number_restore.data("original-value"));
            });

            $('#phone_number').on('keyup change', function() {
            if ($(this).val() != '') {
                    $('#submit_phone_number').attr("disabled", false);
            } else {
                $('#submit_phone_number').attr("disabled", true);
            }
           });


           $('#edit_address').on('click', function() {
                $("#edit_address_form").removeClass('d-none');
                $("#show_address_form").addClass('d-none');
            });
            $('#cancel_address').on('click', function() {
                var address_restore = $("#address");
                $("#edit_address_form").addClass('d-none');
                $("#show_address_form").removeClass('d-none');
                address_restore.val(address_restore.data("original-value"));
            });

            $('#address').on('keyup change', function() {
            if ($(this).val() != '') {
                    $('#submit_address').attr("disabled", false);
            } else {
                $('#submit_address').attr("disabled", true);
            }
           });
    });

</script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\P\tekenens_project\resources\views/admin/contact/show.blade.php ENDPATH**/ ?>