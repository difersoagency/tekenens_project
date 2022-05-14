

<?php $__env->startSection('title'); ?>Portofolio
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
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
					<div class="card-header">
						<h5>List of Portofolio</h5>
						<span>
                            All <code>Portofolio</code> made by the Artist of <code>Tekenens</code> are here.
						</span>
					</div>
					<div class="card-block row">
						<div class="col-sm-12 col-lg-12 col-xl-12">
							<div class="table-responsive table-border-radius">
								<table class="table table-hover table-striped">
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
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tekenens_project\resources\views/admin/portofolio/show.blade.php ENDPATH**/ ?>