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
	<?php echo $__env->renderComponent(); ?>

	<div class="container-fluid">
        <div class="mb-3"><a type="button" class="btn btn-primary btn-sm" href="<?php echo e(route('team.create')); ?>"><i
        class="fa fa-plus"></i> Create</a></div>

        <?php if(count($data) <= 0): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert"> No data found in database</div>
        <?php else: ?>
        <div class="row row-cols-1 row-cols-lg-2 g-2 g-lg-2 d-flex align-items-stretch">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
	            <div class="card custom-card">
                    <div class="card-profile">
                        <?php if($d->photo): ?>
                        <img class="rounded-circle"  src="<?php echo e(asset('storage/'.$d->photo)); ?>"  alt="" />
                        <?php else: ?>
                        <img class="rounded-circle"  src="<?php echo e(asset('assets/images/dashboard/1.png')); ?>"  alt="" />
                        <?php endif; ?>
                    </div>
	                <div class="text-center profile-details">
	                   <h4><?php echo e($d->name); ?></h4>
	                    <h6><?php echo e($d->role); ?></h6>
	                </div>
	                <div class="card-footer row">
	                    <div class="col-6 col-sm-6">
                            <a href="<?php echo e(route('team.edit',$d->id)); ?>" class="btn btn-warning" type="button">Edit</a>
	                    </div>
	                    <div class="col-6 col-sm-6">
                            <button class="btn btn-danger" type="button"  id="delete_team" onclick="delete_team(<?php echo e($d->id); ?>)"  >Delete</button>
	                    </div>
	                </div>
	            </div>
	        </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
	</div>


	<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/sweet-alert/sweetalert.min.js')); ?>"></script>
    <script>
       function delete_team (id){
                    swal({
                        title: "Delete Team ?",
                        text: "Once deleted, you will not be able to recover Delete Team",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '/admin/team/delete',
                                type: 'DELETE',
                                dataType: 'json',
                                data: {"id": id, "_method": "DELETE", _token: "<?php echo e(csrf_token()); ?>"},
                                success: function(result) {
                                    if(result.info == "success"){
                                        window.location.reload();
                                        swal(result.msg, {
                                            icon: "success",
                                        });
                                        window.location.reload();
                                    }
                                    else{
                                        swal(result.msg, {
                                            icon: "error",
                                        });
                                    }
                                }
                            });
                        } else {
                            swal("Delete has been cancelled");
                        }
                    })
                }
        </script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\P\tekenens_project\resources\views/admin/team/show.blade.php ENDPATH**/ ?>