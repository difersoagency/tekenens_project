<?php $__env->startSection('title'); ?>Portofolio
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Portofolio</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item active">Portofolio</li>
	<?php echo $__env->renderComponent(); ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
                        <div class="mb-3"><a type="button" class="btn btn-primary btn-sm" href="<?php echo e(route('portofolio.create')); ?>"><i class="fa fa-plus"></i> Create</a></div>
                            <div class="table-responsive">
							    <table class="display datatables" id="showtable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Project Name</th>
                                            <th scope="col">Categories</th>
                                            <th scope="col">Published Date</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Kwangya the Universe</td>
                                            <td>2D Anime</td>
                                            <td>March, 02nd 2022</td>
                                            <td>Amira Nur Shifa</td>
                                            <td><span class="badge badge-success">Available</span></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Genie, tell me your wish</td>
                                            <td>Video</td>
                                            <td>December, 25th 2021</td>
                                            <td>Elizabeth Danubrata</td>
                                            <td><span class="badge badge-danger">Not Available</span></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
					</div>
				</div>
			</div>

        </div>
	</div>

	<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
    <script>
        $(function(){
            $('#showtable').DataTable();
        });
    </script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tekenens_project\resources\views/admin/portofolio/show.blade.php ENDPATH**/ ?>