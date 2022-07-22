

<?php $__env->startSection('title'); ?>
    Portofolio
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/photoswipe.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/sweetalert2.css')); ?>">
    <style>
        .max-lines {
            display: block; /* or inline-block */
            text-overflow: Ellipsis;
            Word-wrap: break-Word;
            overflow: hidden;
            max-height: 5.4em;
            line-height: 1.8em;
        }
        .btn-edit {
            display: inline-block;
            text-decoration: none;
            background: #f1e4a1;
            color: #FFF;
            width: 22px;
            height: 22px;
            line-height: 22px;
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
            width: 22px;
            height: 22px;
            line-height: 22px;
            border-radius: 50%;
            text-align: center;
            vertical-align: middle;
            overflow: hidden;
            transition: .4s;
        }

        .btn-delete:hover {
            background: #d43545;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3>Portofolio</h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item active">Portofolio</li>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid">
        <div class="mb-3">
            <a type="button" class="btn btn-primary btn-sm" href="<?php echo e(route('portofolio.create')); ?>"><i
                    class="fa fa-plus"></i> Create</a>
        </div>
        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-2 d-flex align-items-stretch">
            <?php $__empty_1 = true; $__currentLoopData = $s; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col">
                <div class="card reveal">
                    <div class="blog-box blog-grid">
                        <div class="blog-wrraper">
                            <a href="blog-single.html"><img class="img-fluid top-radius-blog" style="width:100%; aspect-ratio: 1 / 1;" src="<?php echo asset("storage/images/portofolio"); ?>/<?php echo e($i->id); ?>/<?php echo e($i->DetailPortofolio->first()->media); ?>"
                                    alt="" /></a>
                        </div>
                        <div class="blog-details-second">
                            <div class="blog-post-date"><span class="blg-month"><?php echo e(\Carbon\Carbon::parse($i->publish_date)->format('d M')); ?></span><span
                                    class="blg-date"><?php echo e(\Carbon\Carbon::parse($i->publish_date)->format('Y')); ?></span></div>
                            <a href="blog-single.html">
                                <h6 class="blog-bottom-details"><?php echo e($i->title); ?></h6>
                            </a>
                            <div class="max-lines"><?php echo $i->description; ?></div>
                            <div class="detail-footer">
                                <ul class="sociyal-list d-flex justify-content-between">
                                    <li><i class="fa fa-comments-o"></i><?php echo e($i->category->implode('name', ', ')); ?></li>
                                    <li>
                                        <a href="#" class="btn-edit" id="btnedit" data-id="<?php echo e($i->id); ?>"><i
                                            class="fa fa-pencil fa-fw text-light m-auto"></i></a>

                                        <a href="#" class="btn-delete" id="btndelete" data-id="<?php echo e($i->id); ?>"><i
                                            class="fa fa-trash fa-fw text-light m-auto"></i></a>
                                    </li>
                                </ul>
                            </div>
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
        </div>
    </div>
    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/sweet-alert/sweetalert.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/animation/scroll-reveal/scrollreveal.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/modernizr.js')); ?>"></script>
        <script>
            $(function() {
                if (Modernizr.csstransforms3d) {
                    window.sr = ScrollReveal();
                    sr.reveal('.reveal', {
                        duration: 800,
                        delay: 400,
                        reset: true,
                        easing: 'linear',
                        scale: 1
                    });
                }
                $(document).on('click', '#btnedit', function(){
                    var id = $(this).attr('data-id');
                    swal({
                        title: "Edit Portofolio?",
                        text: "Are you sure you want to edit this Portofolio?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willEdit) => {
                        if (willEdit) {
                            window.location.href = "/admin/portofolio/edit/"+id;
                        }
                    })
                })
                $(document).on('click', '#btndelete', function(){
                    var id = $(this).attr('data-id');
                    swal({
                        title: "Delete Portofolio?",
                        text: "Once deleted, you will not be able to recover Portofolio",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '/admin/portofolio/delete',
                                type: 'DELETE',
                                dataType: 'json',
                                data: {"id": id, "_method": "DELETE", _token: "<?php echo e(csrf_token()); ?>"},
                                success: function(result) {
                                    if(result.info == "success"){
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
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tekenens_main\resources\views/admin/portofolio/show.blade.php ENDPATH**/ ?>