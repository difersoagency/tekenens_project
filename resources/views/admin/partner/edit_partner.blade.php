<form action="{{ route('partner.update',$data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
    <div class="mb-3">
        <label class="col-form-label" for="recipient-name">Name:</label>
        <input class="form-control" placeholder="Name partner" type="text" name="partner" value="{{ $data->name }}">
    </div>
    <div class="mb-3">
        <label class="col-sm-3 col-form-label" for="upload_photo">Upload Photo</label>
        <div class="col-sm-9">
            <input class="form-control" id="upload_photo" type="file" name="photo"  accept="image/*" onchange="preview_image()"/>
            <input type="hidden" name="old_image" value="{{ $data->photo }}"/>
            <small class="text-danger d-none" id="alert_ext">Can only upload pictures format !</small>
        </div>
        @if($data->photo != '')
        <img src="{{ asset('storage/'.$data->photo) }}"  class="preview_photo" id style="max-height: 250px;">
        @else
        <img  class="preview_photo" style="max-height: 250px;">
        @endif
    </div>



</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
<button class="btn btn-primary" type="submit"  >Update</button>
</div>
</form>