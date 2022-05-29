

<?php $__env->startSection('title'); ?>
    Article
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
    <style>
        /* #imageblog{
                                                        position: relative;
                                                        background: #f90;
                                                        width: 130px;
                                                        height: 95px;
                                                        float: left;
                                                        margin-right: 15px;
                                                    } */
        .btn-edit {
            display: inline-block;
            text-decoration: none;
            background: #f1e4a1;
            color: #FFF;
            width: 35px;
            height: 35px;
            line-height: 35px;
            border-radius: 50%;
            text-align: center;
            vertical-align: middle;
            overflow: hidden;
            transition: .4s;
        }

        .btn-edit:hover {
            background: #e4ca43;
        }

        .btn-delete {
            display: inline-block;
            text-decoration: none;
            background: #e4818b;
            color: #FFF;
            width: 35px;
            height: 35px;
            line-height: 35px;
            border-radius: 50%;
            text-align: center;
            vertical-align: middle;
            overflow: hidden;
            transition: .4s;
        }

        .btn-delete:hover {
            background: #d43545;
        }

        #blog-hover {
            position: absolute;
            z-index: 2;
            top: 10px;
            /* margin: 0 auto; */
            display: none !important;
            right: 30px;
            width: 45px;
        }

        .blog-box:hover #blog-hover {
            display: block;
        }

        .blog-box:hover>.col {
            opacity: 0.2;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3>Article</h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item active">Article</li>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="mb-3"><a type="button" class="btn btn-primary btn-sm" href="<?php echo e(route('article.create')); ?>"><i
                    class="fa fa-plus"></i> Create</a></div>
        <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-2 d-flex align-items-stretch">
            <?php $__empty_1 = true; $__currentLoopData = $s; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col">
                    <div class="card">
                        <div class="blog-box blog-list row">
                            <div class="col-xl-5 col-12"><img class="img-fluid sm-100-w" src="<?php echo e(asset('storage/images/article/'.$i->og_image)); ?>" alt="" />
                            </div>
                            <div class="col-xl-7 col-12">
                                <div class="blog-details">
                                    <div class="blog-date"><span>05</span> January 2022</div>
                                    <a href="learning-detailed.html">
                                        <h6><?php echo e($i->title); ?></h6>
                                    </a>
                                    <div class="blog-bottom-content">
                                        <ul class="blog-social">
                                            <li>by: <?php echo e($i->User->name); ?></li>
                                        </ul>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div id="blog-hover d-flex justify-content-center">
                                <ul>
                                    <li>
                                        <a href="" class="btn-edit"><i
                                                class="fa fa-pencil fa-fw text-light m-auto"></i></a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="" class="btn-delete"><i
                                                class="fa fa-trash fa-fw text-light m-auto"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="alert alert-danger inverse alert-dismissible fade show  d-flex justify-content-center bg-white"
                    role="alert">
                    <i class="icon-alert txt-white"></i>
                    <p class="txt-danger"><strong><em>The Data is not available</em></strong></p>
                </div>
            <?php endif; ?>
            <!-- <div class="col">
                <div class="card">
                    <div class="blog-box blog-list row">
                        <div class="col-xl-5 col-12 col">
                            <img class="img-fluid sm-100-w" id="imgcover" src="<?php echo e(asset('assets/images/faq/1.jpg')); ?>"
                                alt="" />
                        </div>
                        <div class="col-xl-7 col-12 col">
                            <div class="blog-details">
                                <div class="blog-date"><span>05</span> January 2022</div>
                                <a href="learning-detailed.html">
                                    <h6>Java Language</h6>
                                </a>
                                <div class="blog-bottom-content">
                                    <ul class="blog-social">
                                        <li>by: Admin</li>
                                    </ul>
                                    <hr />
                                    <p class="mt-0">
                                        inventore veritatis et quasi architecto beatae vit.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="blog-hover d-flex justify-content-center">
                            <ul>
                                <li>
                                    <a href="" class="btn-edit"><i
                                            class="fa fa-pencil fa-fw text-light m-auto"></i></a>
                                </li>
                                <li class="pt-2">
                                    <a href="" class="btn-delete"><i
                                            class="fa fa-trash fa-fw text-light m-auto"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="blog-box blog-list row">
                        <div class="col-xl-5 col-12"><img class="img-fluid sm-100-w"
                                src="<?php echo e(asset('assets/images/faq/1.jpg')); ?>" alt="" /></div>
                        <div class="col-xl-7 col-12">
                            <div class="blog-details">
                                <div class="blog-date"><span>05</span> January 2022</div>
                                <a href="learning-detailed.html">
                                    <h6>Java Language</h6>
                                </a>
                                <div class="blog-bottom-content">
                                    <ul class="blog-social">
                                        <li>by: Admin</li>
                                    </ul>
                                    <hr />
                                    <p class="mt-0">
                                        inventore veritatis et quasi architecto beatae vit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="blog-box blog-list row">
                        <div class="col-xl-5 col-12"><img class="img-fluid sm-100-w"
                                src="<?php echo e(asset('assets/images/faq/1.jpg')); ?>" alt="" /></div>
                        <div class="col-xl-7 col-12">
                            <div class="blog-details">
                                <div class="blog-date"><span>05</span> January 2022</div>
                                <a href="learning-detailed.html">
                                    <h6>Java Language</h6>
                                </a>
                                <div class="blog-bottom-content">
                                    <ul class="blog-social">
                                        <li>by: Admin</li>
                                    </ul>
                                    <hr />
                                    <p class="mt-0">
                                        inventore veritatis et quasi architecto beatae vit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="blog-box blog-list row">
                        <div class="col-xl-5 col-12 col">
                            <img class="img-fluid sm-100-w" id="imgcover" src="<?php echo e(asset('assets/images/faq/1.jpg')); ?>"
                                alt="" />
                        </div>
                        <div class="col-xl-7 col-12 col">
                            <div class="blog-details">
                                <div class="blog-date"><span>05</span> January 2022</div>
                                <a href="learning-detailed.html">
                                    <h6>Java Language</h6>
                                </a>
                                <div class="blog-bottom-content">
                                    <ul class="blog-social">
                                        <li>by: Admin</li>
                                    </ul>
                                    <hr />
                                    <p class="mt-0">
                                        inventore veritatis et quasi architecto beatae vit.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="blog-hover d-flex justify-content-center">
                            <ul>
                                <li>
                                    <a href="" class="btn-edit"><i
                                            class="fa fa-pencil fa-fw text-light m-auto"></i></a>
                                </li>
                                <li class="pt-2">
                                    <a href="" class="btn-delete"><i
                                            class="fa fa-trash fa-fw text-light m-auto"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="blog-box blog-list row">
                        <div class="col-xl-5 col-12"><img class="img-fluid sm-100-w"
                                src="<?php echo e(asset('assets/images/faq/1.jpg')); ?>" alt="" /></div>
                        <div class="col-xl-7 col-12">
                            <div class="blog-details">
                                <div class="blog-date"><span>05</span> January 2022</div>
                                <a href="learning-detailed.html">
                                    <h6>Java Language</h6>
                                </a>
                                <div class="blog-bottom-content">
                                    <ul class="blog-social">
                                        <li>by: Admin</li>
                                    </ul>
                                    <hr />
                                    <p class="mt-0">
                                        inventore veritatis et quasi architecto beatae vit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="card">
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
				</div> -->

        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
        <script>
            // $(function(){
            //     $('#showtable').DataTable();
            // });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tekenens_project\resources\views/admin/article/show.blade.php ENDPATH**/ ?>