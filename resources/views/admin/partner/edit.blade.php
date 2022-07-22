<form action="{{ route('partner.update',$data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
    <div class="mb-3">
        <label class="col-form-label" for="recipient-name">Name:</label>
        <input class="form-control" placeholder="Name partner" type="text" name="partner" value="{{ $data->name }}">
        <input type="hidden" name="old_image" value="{{ $data->photo }}"/>
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
                        <div class="middles">
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
                        @if($data->photo != '')
                        <img
                        alt="preview image" style="max-height: 300;  max-width: 300px" class="preview_photo" src="{{ asset('storage/'.$data->photo) }}">
                        @endif
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
