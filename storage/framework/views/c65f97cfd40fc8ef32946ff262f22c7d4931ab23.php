<form action="<?php echo e(route('team.update',$data->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
                            <?php echo e(method_field('PUT')); ?>

    <div class="mb-3">
        <label class="col-form-label" for="recipient-name">Name:</label>
        <input class="form-control" placeholder="Name of the person" type="text" name="name" value="<?php echo e($data->name); ?>">
        <input type="hidden" name="old_image" value="<?php echo e($data->photo); ?>"/>
    </div>
    <div class="mb-3">
        <label class="col-form-label" for="recipient-name">Role:</label>
        <input class="form-control" name="role" placeholder="Ex : editor, photographer" value="<?php echo e($data->role); ?>">
    </div>
    <div class="mb-3">
        <label class="col-form-label" for="recipient-name">Status:</label>
        <div class="form-check radio radio-primary">
            <input class="form-check-input" id="radio11" type="radio" name="status" value="1"  <?php echo e(($data->status == 1 ? ' checked' : '')); ?>/>
            <label class="form-check-label" for="radio11">Enabled</label>
        </div>
        <div class="form-check radio radio-primary">
            <input class="form-check-input" id="radio22" type="radio" name="status" value="1"  <?php echo e(($data->status == 0 ? ' checked' : '')); ?> />
            <label class="form-check-label" for="radio22">Disabled</label>
        </div>
    </div>
    <div class="mb-3">
        <label class="col-sm-3 col-form-label" for="upload_photo">Upload Photo</label>
        <div class="col-sm-9">
            <input class="form-control" id="upload_photo" type="file" name="photo"  accept="image/*"/>
            <small class="text-danger d-none" id="alert_ext">Can only upload pictures format !</small>
        </div>
    </div>
    <div class="mb-3 d-none"id="preview">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-9">
                <div class="img-wrraper">
                    <div class="avatar">
                        <img id="preview_photo"
                        alt="preview image" style="max-height: 300;  max-width: 300px" class=" preview_photo">
                        <div class="middle">
                            <button class="btn btn-danger" type="button" onclick="remove_image()"><i class="fa fa-trash-o"></i></button>
                        </div>
                </div>
            </div>
    </div>
</div>



<div class="mb-3" id="old_image">
    <label class="col-sm-3 col-form-label" for="upload_photo"></label>
    <div class="mb-3 " >
        <div class="col-sm-3">
        </div>
        <div class="col-sm-9">
                <div class="img-wrraper">
                    <div class="avatar">
                        <?php if($data->photo != ''): ?>
                        <img
                        alt="preview image" style="max-height: 300;  max-width: 300px" class="preview_photo" src="<?php echo e(asset('storage/'.$data->photo)); ?>">
                        <?php endif; ?>
                     </div>
                </div>
        </div>
    </div>
</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
<button class="btn btn-primary" type="submit"  >Update</button>
</div>
</form>
<?php /**PATH D:\Project\clone wisnu\tekenens_project\resources\views/admin/team/edit.blade.php ENDPATH**/ ?>