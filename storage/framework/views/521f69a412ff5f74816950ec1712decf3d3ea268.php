<?php $__currentLoopData = $detailportfolio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-5 col-md-3 karya mb-4 position-relative w-4 h-4" data-aos="zoom-in" role="button">
    <div class="overlay-porto text-center">
        <h3 class="text-white font-bold"><?php echo e($d->Portofolio->title); ?></h3>
        <p class="text-white">Client Name (<?php echo e(\Carbon\Carbon::parse($d->Portofolio->publish_date)->format('Y')); ?>)</p>
    </div>
    <img src="<?php echo e(asset('storage/images/portofolio/'.'/'.$d->portofolio_id.'/'.$d->media)); ?>" alt="Team Tekenens" width="auto" height="100%">
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH G:\Diverso\wisnu\resources\views/pages/portfolio_data.blade.php ENDPATH**/ ?>