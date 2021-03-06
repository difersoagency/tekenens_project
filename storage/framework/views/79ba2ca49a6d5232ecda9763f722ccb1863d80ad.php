

<?php $__env->startSection('title'); ?>Testimoni
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
.avatar {
    position: relative;
    width: 50%;
  }

  .preview_photo {
    opacity: 1;
    display: block;
    width: 100%;
    height: auto;
    transition: .5s ease;
    backface-visibility: hidden;
  }

  .middle {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
  }

  .avatar:hover .preview_photo {
    opacity: 0.3;
  }

  .avatar:hover .middle {
    opacity: 1;
  }

  .text {
    background-color: #04AA6D;
    color: white;
    font-size: 16px;
    padding: 16px 32px;
  }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<?php $__env->startComponent('components.breadcrumb'); ?>
		<?php $__env->slot('breadcrumb_title'); ?>
			<h3>Testimoni</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item active">Testimoni</li>
	<?php echo $__env->renderComponent(); ?>
    <?php if(Session::has('error')  ): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo e(Session::get('error')); ?>

        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
    <?php if(Session::has('success')  ): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo e(Session::get('success')); ?>

        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <div class="container-fluid">
    <div class="mb-3"><button type="button" class="btn btn-primary btn-sm" id="create"><i
        class="fa fa-plus"></i> Create</button></div>
    <div class="row learning-block">
        <div class="col-xl-12 xl-60">
            <?php if(count($data) <= 0 ): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert"> No data found in database</div>
            <?php else: ?>
            <div class="row">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 xl-50 col-sm-6 box-col-6">
                    <div class="card">
                        <div class="product-box learning-box"  >
                            <div class="product-img" style="text-align: center;">
                                <img class="img-fluid top-radius-blog" src="<?php echo e(asset('storage/'.$d->photo)); ?>" alt="" style="width:50%; "/>
                                <div class="product-hover">
                                    <ul>
                                        <li class="btn-warning update_testimoni" id="update_testimoni" data-id="<?php echo e($d->id); ?>">
                                            <button class="btn " ><i class="fa fa-pencil text-light fa-fw "></i></button>
                                        </li>
                                        <li class="btn-danger"  onclick="delete_testimoni(<?php echo e($d->id); ?>)">
                                            <button class="btn"><i class="fa fa-trash text-light fa-fw"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="details-main">
                                <a href="learning-detailed.html">
                                    <div class="bottom-details">
                                        <h6><?php echo e($d->name); ?></h6>
                                    </div>
                                </a>
                                <p>
                                    <?php echo Str::words($d->description, 20, ' ...'); ?>

                                  </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

    <div class="modal fade" id="testimoni_modal_create" tabindex="-1"  data-bs-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Testimoni</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"  ></button>
                </div>
                <div class="modal-body" id="create_testimoni_body">
                </div>
            </div>
        </div>
      </div>

      <div class="modal fade" id="testimoni_modal_update" tabindex="-1"  data-bs-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Testimoni</h5>
                    <button class="btn-close" type="button"   data-bs-dismiss="modal" ></button>
                </div>
                <div class="modal-body" id="edit_testimoni_body">
                </div>
             </div>
       </div>
      </div>

	<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/sweet-alert/sweetalert.min.js')); ?>"></script>
    <script>
         function delete_testimoni (id){
                    swal({
                        title: "Delete Testimoni ?",
                        text: "Once deleted, you will not be able to recover Delete Testimoni",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '/admin/testimoni/delete',
                                type: 'DELETE',
                                dataType: 'json',
                                data: {"id": id, "_method": "DELETE", _token: "<?php echo e(csrf_token()); ?>"},
                                success: function(result) {
                                    if(result.info == "success"){
                                        window.location.reload();
                                        swal(result.msg, {
                                            icon: "success",
                                        });
                                        window.location.reload();
                                    }
                                    else{
                                        swal(result.msg, {
                                            icon: "error",
                                        });
                                    }
                                }
                            });
                        } else {
                            swal("Delete has been cancelled");
                        }
                    })
                }

    $(document).on('click', '#create', function(event) {
        event.preventDefault();
        $.ajax({
            url: "/admin/testimoni/create/",
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {

                $('#testimoni_modal_create').modal("show");
                $('#create_testimoni_body').html(result).show();
                view_image("create");
            },

        })
        });


        function view_image(value) {
    $('#upload_photo').change(function(){
        $('#check_image').val("1");
        $('#preview').removeClass("d-none");
        if(value == 'update'){
            $('#old_image').addClass("d-none");
        }


    let reader = new FileReader();

    reader.onload = (e) => {
        $('#preview_photo').attr('src', e.target.result);
    }


    reader.readAsDataURL(this.files[0]);

    var ext = this.files[0].name.split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
        $('#alert_ext').removeClass("d-none");
        $('#preview').addClass("d-none");

        }else{
            $('#alert_ext').addClass("d-none");
        }
         });
    }




$(document).on('click', '.update_testimoni', function(event) {
    swal({
        title: "Edit Testimoni?",
        text: "Are you sure you want to edit Testimoni?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willEdit) => {
        if (willEdit) {
        event.preventDefault();
var id = $(this).data('id');
$.ajax({
    url: "/admin/testimoni/edit/" + id,
    beforeSend: function() {
        $('#loader').show();
    },
    // return the result
    success: function(result) {

        $('#testimoni_modal_update').modal("show");
        $('#edit_testimoni_body').html(result).show();
        view_image("update");
        delete_image();

    },

})
        }
    })
});











    function remove_image() {
$('#upload_photo').val('');
$('#preview').addClass("d-none");
};

function delete_image(){
        $('#upload').removeClass("d-none");
        $('#get').addClass("d-none");

    }

</script>
	<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\tekenens_project\resources\views/admin/testimoni/show.blade.php ENDPATH**/ ?>