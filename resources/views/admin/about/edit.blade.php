<div class="row">
    <div class="col-12">
            <form method="POST" action="/admin/about/update" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                	<label class="col-form-label">Description</label>
                	<textarea class="form-control" placeholder="Enter Description" id="description" name="description" placeholder="Enter Description of Project"></textarea>
                    <div id="description_fb" class="invalid-feedback"></div>
                </div>
                <div class="mb-3 row">
                	<label class="col-form-label col-12">Thumbnail</label>
                    <div class="col-lg-6 col-md-8 col-sm-12">
                	    <input class="form-control" type="file" id="thumbnail" name="thumbnail" placeholder="Choose JPG/PNG File" accept="image/png, image/jpeg, image/jpg"/>
                        <img id="uploadPreview" style="width:50%; height: auto" class="mt-1"/>
                        <div id="thumbnail_fb" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="mt-2">
                    <button class="btn btn-danger" data-bs-dismiss="modal" >Cancel</button>
                    <button class="btn btn-warning pull-right" id="btnsubmit" type="submit">Save</button>
                </div>
            </form>
    </div>
</div>
