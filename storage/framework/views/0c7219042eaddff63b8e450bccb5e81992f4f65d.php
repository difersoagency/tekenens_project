<?php $__currentLoopData = $detailportfolio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-12 px-5 px-md-0 col-md-3 karya mb-4 position-relative w-4 h-4 detailporto h-100" data-aos="zoom-in" role="button" data-id="<?php echo e($d->id); ?>">
    <div class="overlay-porto text-center h-100">
        <h2 class="text-white font-bold"><?php echo e($d->Portofolio->title); ?></h2>
        <p class="text-white">Client Name (<?php echo e(\Carbon\Carbon::parse($d->Portofolio->publish_date)->format('Y')); ?>)</p>
    </div>
    <img src="<?php echo e(asset('storage/images/portofolio/'.'/'.$d->portofolio_id.'/'.$d->media)); ?>" alt="Team Tekenens" width="auto" height="100%" class="img-fluid">
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH D:\Project\New folder\tekenens_project\resources\views/pages/portfolio_data.blade.php ENDPATH**/ ?>