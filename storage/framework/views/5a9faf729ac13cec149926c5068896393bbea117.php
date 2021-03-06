

<?php $__env->startSection('title'); ?>Article
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3>Article</h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item active">Article</li>
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
                        <div class="mb-3"><a type="button" class="btn btn-primary btn-sm" href="<?php echo e(route('article.create')); ?>"><i class="fa fa-plus"></i> Create</a></div>
                        <div class="table-responsive">
							<table class="display datatables" id="showtable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Published Date</th>
                                        <th>Published By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mengapa Pemilihan Warna Penting?</td>
                                        <td>February, 1st 2022</td>
                                        <td>Natasha Aurelia</td>
                                        <td><span class="badge badge-success">Available</span></td>
                                        <td>
                                        <a class="btn btn-light btn-pill btn-xs" href="" aria-label="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-warning btn-pill btn-xs" href="" aria-label="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger btn-pill btn-xs" href="" aria-label="Delete">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Pecinta Anime wajib banget baca Manga ini!</td>
                                        <td>January, 25th 2022</td>
                                        <td>Rifky Asyari</td>
                                        <td><span class="badge badge-success">Available</span></td>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\P\theme\resources\views/admin/article/show.blade.php ENDPATH**/ ?>