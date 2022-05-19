<?php $__env->startSection('title'); ?>Home
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/owlcarousel.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Home</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item active">Home</li>
	<?php echo $__env->renderComponent(); ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
						<h4 class="pull-left">Home Page</h4>
					</div>
					<div class="card-body">
						<div class="tabbed-card">
							<ul class="pull-right nav nav-pills nav-primary" id="pills-clrtabinfo" role="tablist">
								<li class="nav-item"><a class="nav-link active" id="pills-clrhome-tabinfo" data-bs-toggle="pill" href="#pills-clrhomeinfo" role="tab" aria-controls="pills-clrhome" aria-selected="true">Video Banner</a></li>
								<li class="nav-item"><a class="nav-link" id="pills-clrprofile-tabinfo" data-bs-toggle="pill" href="#pills-clrprofileinfo" role="tab" aria-controls="pills-clrprofile" aria-selected="false">Description</a></li>
								<li class="nav-item"><a class="nav-link" id="pills-clrcontact-tabinfo" data-bs-toggle="pill" href="#pills-clrcontactinfo" role="tab" aria-controls="pills-clrcontact" aria-selected="false">Partner</a></li>
							</ul>
							<div class="tab-content" id="pills-clrtabContentinfo">
								<div class="tab-pane fade show active" id="pills-clrhomeinfo" role="tabpanel" aria-labelledby="pills-clrhome-tabinfo">
                                    <div class="mb-3"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</button></div>
                                    <div class="d-flex justify-content-center">
                                        <video class="bgvideo-comingsoon" width="100%" id="bgvid" controls>
                                            <source src="<?php echo e(asset('assets/video/auth-bg.mp4')); ?>" type="video/mp4" />
                                        </video>
                                    </div>
								</div>
								<div class="tab-pane fade" id="pills-clrprofileinfo" role="tabpanel" aria-labelledby="pills-clrprofile-tabinfo">
									<p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
										scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
										release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
									</p>
								</div>
								<div class="tab-pane fade" id="pills-clrcontactinfo" role="tabpanel" aria-labelledby="pills-clrcontact-tabinfo">
									<div class="owl-carousel owl-theme" id="owl-carousel-12">
                                        <div class="item">

                                            <div class="card">
                                                <div class="top-dealerbox text-center">
                                                    <img class="card-img-top" src="<?php echo e(asset('assets/images/dashboard-2/1.png')); ?>" alt="...">
                                                    <h6>PT. Equity World</h6>
                                                    <div class="d-flex justify-content-around  mb-2"><a class="btn btn-warning btn-sm" href="#">Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="#">Delete</a></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card">
                                                <div class="top-dealerbox text-center">
                                                    <img class="card-img-top" src="<?php echo e(asset('assets/images/dashboard-2/1.png')); ?>" alt="...">
                                                    <h6>PT. Wikaya Amartapura</h6>
                                                    <div class="d-flex justify-content-around  mb-2"><a class="btn btn-warning btn-sm" href="#">Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="#">Delete</a></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card">
                                                <div class="top-dealerbox text-center">
                                                    <img class="card-img-top" src="<?php echo e(asset('assets/images/dashboard-2/1.png')); ?>" alt="...">
                                                    <h6>Patt Lousi</h6>
                                                    <div class="d-flex justify-content-around  mb-2"><a class="btn btn-warning btn-sm" href="#">Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="#">Delete</a></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card">
                                                <div class="top-dealerbox text-center">
                                                    <img class="card-img-top" src="<?php echo e(asset('assets/images/dashboard-2/1.png')); ?>" alt="...">
                                                    <h6>CV. Nirwana Agung</h6>
                                                    <div class="d-flex justify-content-around  mb-2"><a class="btn btn-warning btn-sm" href="#">Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="#">Delete</a></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card">
                                                <div class="top-dealerbox text-center">
                                                    <img class="card-img-top" src="<?php echo e(asset('assets/images/dashboard-2/1.png')); ?>" alt="...">
                                                    <h6>Nurmalita Agustin</h6>
                                                    <div class="d-flex justify-content-around  mb-2"><a class="btn btn-warning btn-sm" href="#">Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="#">Delete</a></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card">
                                                <div class="top-dealerbox text-center">
                                                    <img class="card-img-top" src="<?php echo e(asset('assets/images/dashboard-2/1.png')); ?>" alt="...">
                                                    <h6>Nihongo Mantappu</h6>
                                                    <div class="d-flex justify-content-around  mb-2"><a class="btn btn-warning btn-sm" href="#">Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="#">Delete</a></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
       <script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
       <script src="<?php echo e(asset('assets/js/owlcarousel/owl-custom.js')); ?>"></script>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tekenens_project\resources\views/admin/home/show.blade.php ENDPATH**/ ?>