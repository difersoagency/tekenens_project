<form action="<?php echo e(route('partner.update',$data->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo e(method_field('PUT')); ?>

    <div class="mb-3">
        <label class="col-form-label" for="recipient-name">Name:</label>
        <input class="form-control" placeholder="Name partner" type="text" name="partner" value="<?php echo e($data->name); ?>">
        <input class="form-control" id="check_image" type="hidden" name="check_image" value="0"/>
    </div>
    <div class="mb-3">
        <label class="col-sm-3 col-form-label" for="upload_photo">Upload Photo</label>

        <div class="mb-3    <?php if($data->photo == ''): ?> d-none <?php endif; ?>" id="get">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-9">
                <img id="get_photo"
                    alt="get image" style="max-height: 250px; max-width: 300px" src="<?php echo e(asset('storage/'.$data->photo)); ?>">
                    <button class="btn btn-danger" id="reset_upload" type="button" onclick="delete_image()"><i class="fa fa-trash-o"></i></button>
            </div>
        </div>

        <div class="col-sm-9 <?php if($data->photo != ''): ?> d-none <?php endif; ?>" id="upload">
            <input class="form-control" id="upload_photo" type="file" name="photo"  accept="image/*"/>
            <input type="hidden" name="old_image" value="<?php echo e($data->photo); ?>"/>
            <small class="text-danger d-none" id="alert_ext">Can only upload pictures format !</small>
        </div>




        <div class="mb-3 row d-none" id="preview">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-9">
                <img id="preview_photo"
                    alt="preview image" style="max-height: 250px;  max-width: 300px">
            </div>
        </div>

    </div>



</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
<button class="btn btn-primary" type="submit"  >Update</button>
</div>
</form>


<?php /**PATH C:\P\tekenens_project\resources\views/admin/partner/edit_partner.blade.php ENDPATH**/ ?>