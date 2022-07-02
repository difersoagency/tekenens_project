<?php $__currentLoopData = $detailportfolio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-5 col-md-3 karya mb-4 position-relative">
    <div class="overlay-porto text-center">
        <h3 class="text-white font-bold"><?php echo e($d->Portofolio->title); ?></h3>
        <p class="text-white">Client Name (<?php echo e(\Carbon\Carbon::parse($d->Portofolio->publish_date)->format('Y')); ?>)</p>
    </div>
    <img src="<?php echo e(asset('storage/images/portofolio/'.'/'.$d->portofolio_id.'/'.$d->media)); ?>" alt="Team Tekenens" width="100%" height="auto">
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH E:\diver\resources\views/pages/portfolio_data.blade.php ENDPATH**/ ?>