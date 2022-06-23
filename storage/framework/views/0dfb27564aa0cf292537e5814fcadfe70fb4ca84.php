<div class="row">
    <div class="col-12">
            <form method="POST" action="/admin/home/video/update" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3 row">
                	<label class="col-form-label col-12">Video</label>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                	    <input class="form-control" type="file" id="video_home" name="video_home" placeholder="Choose Video File" accept="video/*"/>
                        <video class="bgvideo-comingsoon mt-1" width="100%" id="bgvid" controls>
                            <source <?php if(!empty($dp->media)): ?> src="<?php echo e(asset('storage/images/home/'.$dp->media)); ?>" <?php endif; ?> type="video/mp4" id="video_home_preview"/>
                        </video>
                        <div id="video_fb" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="mt-2">
                    <button class="btn btn-danger" data-bs-dismiss="modal" >Cancel</button>
                    <button class="btn btn-warning pull-right" id="btn_save_edit_video" type="submit">Save</button>
                </div>
            </form>
    </div>
</div>
<?php /**PATH E:\tekenens_project\resources\views/admin/home/video/edit.blade.php ENDPATH**/ ?>