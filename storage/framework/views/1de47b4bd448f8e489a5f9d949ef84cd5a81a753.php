<form action="<?php echo e(route('partner.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label class="col-form-label" for="recipient-name">Name:</label>
        <input class="form-control" placeholder="Name partner" type="text" name="partner" value="">
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
            <img id="preview_photo"
                alt="preview image" style="max-height: 250px;  max-width: 300px">
        </div>

    </div>


</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
<button class="btn btn-primary" type="submit"  >Create</button>
</div>
</form>
<?php /**PATH C:\P\tekenens_project\resources\views/admin/partner/create_partner.blade.php ENDPATH**/ ?>