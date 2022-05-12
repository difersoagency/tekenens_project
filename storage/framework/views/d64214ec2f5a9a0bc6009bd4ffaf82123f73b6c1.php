<?php $__env->startSection('title'); ?>Article
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
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
					<div class="card-header">
						<h5>Article</h5>
						<span>
                            All <code>Articles</code> that has been published on blog by the Admin of <code>Tekenens</code> are here.
						</span>
					</div>
					<div class="card-body">
                        <div class="table-responsive">
							<table class="row-border" id="example-style-7">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Published Date</th>
                                        <th>Published By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mengapa Pemilihan Warna Penting?</td>
                                        <td>February, 1st 2022</td>
                                        <td>Natasha Aurelia</td>
                                        <td>
                                            <a class="btn btn-warning btn-pill btn-xs" href="" aria-label="Edit">
                                                <i data-feather="edit-2"></i>
                                            </a>
                                            <a class="btn btn-danger btn-pill btn-xs" href="" aria-label="Delete">
                                                <i data-feather="trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Pecinta Anime wajib banget baca Manga ini!</td>
                                        <td>January, 25th 2022</td>
                                        <td>Rifky Asyari</td>
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
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tekenens_project\resources\views/admin/article/show.blade.php ENDPATH**/ ?>