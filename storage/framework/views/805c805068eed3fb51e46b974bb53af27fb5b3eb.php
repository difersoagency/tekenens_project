<div class="row">
    <div class="col-12">
            <form>
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
            </form>
    </div>
</div>
<?php /**PATH C:\laragon\www\tekenens_project\resources\views/admin/home/video/edit.blade.php ENDPATH**/ ?>