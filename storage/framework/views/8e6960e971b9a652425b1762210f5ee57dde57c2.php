

<?php $__env->startSection('title'); ?>Dashboard
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/chartist.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/owlcarousel.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/prism.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Home</h3>
		<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>
    <div class="container">
		<div class="row">
			<div class="col-sm-12 col-xl-12 box-col-12">
				<div class="card">
					<div class="card-header pb-0">
						<h5>Website Engagement on 2022</h5>
					</div>
					<div class="card-body">
						<div id="area-spaline"></div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-xl-6">
			<div class="card">
					<div class="card-header pb-0">
						<h5>Most Popular Articles</h5>
					</div>
					<div class="card-body">
					<?php $__empty_1 = true; $__currentLoopData = $a; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<div class="media d-flex align-items-center">
                                    <img class="img-fluid" width="10%" src="<?php echo e(asset('storage/images/article/'.$i->og_image)); ?>" alt="">
                                    <div class="media-body pl-2">
                                        <a href="#">
                                            <h6><?php echo e($i->title); ?></h6>
                                        </a>
                                        <p><?php echo e($i->meta_desc); ?></p>
                                        <!-- <ul class="rating-star">
                                            <li>                                      <i class="fa fa-star"></i></li>
                                            <li>                                      <i class="fa fa-star"></i></li>
                                            <li>                                      <i class="fa fa-star"></i></li>
                                            <li>                                      <i class="fa fa-star"></i></li>
                                            <li>                                      <i class="fa fa-star"></i></li>
                                        </ul> -->
                                    </div>
                                    <!-- <a class="btn btn-iconsolid" href="#"><i class="icon-bag"></i></a> -->
                                </div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-xl-6">
			<div class="card">
					<div class="card-header pb-0">
						<h5>Most Popular Portfolio</h5>
					</div>
					<div class="card-body">
					<?php $__empty_1 = true; $__currentLoopData = $p; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<div class="media">
						<img src="<?php echo e(asset('storage/images/portofolio/'.$i->id.'/'.$i->DetailPortofolio->first()->media)); ?>" class="align-self-center mr-3" alt="..." style="width:10%;">
						<div class="media-body">
							<h6 class="mt-0 text-success"><?php echo e($i->title); ?></h6>
							<p><?php echo e($i->description); ?></p>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e(asset('assets/js/chart/apex-chart/apex-chart.js')); ?>"></script>
	<!-- <script src="<?php echo e(asset('assets/js/chart/apex-chart/stock-prices.js')); ?>"></script> -->
    <!-- <script src="<?php echo e(asset('assets/js/chart/apex-chart/chart-custom.js')); ?>"></script> -->
	<script>
		$(function(){
			var options1 = {
				chart: {
					height: 350,
					type: 'area',
					toolbar:{
					show: false
					}
				},
				dataLabels: {
					enabled: false
				},
				stroke: {
					curve: 'smooth'
				},
				series: [{
					name: 'Visitor',
					data: [31, 40, 28, 51, 42, 109, 100, 120, 110, 100, 120, 110]
				}],

				xaxis: {
					type: 'string',
					categories: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
				},
				tooltip: {
					x: {
						format: 'string'
					},
				},
				colors:[vihoAdminConfig.primary]
			}

			var chart1 = new ApexCharts(
				document.querySelector("#area-spaline"),
				options1
			);

			chart1.render();
		})
	</script>
	<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tekenens_main\resources\views/admin/dashboard/show.blade.php ENDPATH**/ ?>