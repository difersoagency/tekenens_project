

<?php $__env->startSection('title'); ?>Home
 <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/chartist.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/owlcarousel.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/prism.css')); ?>">
    <style>
        .btn-edit{
            display: inline-block;
            text-decoration: none;
            background: #f1e4a1;
            color: #FFF;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            text-align: center;
            vertical-align: middle;
            overflow: hidden;
            transition: .4s;

        }

        .btn-edit:hover{
            background: #e4ca43;
        }

        .btn-delete{
            display: inline-block;
            text-decoration: none;
            background: #e4818b;
            color: #FFF;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            text-align: center;
            vertical-align: middle;
            overflow: hidden;
            transition: .4s;
        }

        .btn-delete:hover{
            background: #d43545;
        }

        .img-card-custom{
            width: 100%;
            height: 15vw;
            object-fit: scale-down;"
        }



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

.middles {
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

.avatar:hover .middles {
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
			<h3>About</h3>
		<?php $__env->endSlot(); ?>
		<li class="breadcrumb-item active">About</li>
	<?php echo $__env->renderComponent(); ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
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
                <div class="card">
                    <div class="card-header pb-0">
						<h4 class="pull-left">About Page</h4>
					</div>
					<div class="card-body">
                        <div class="my-2">
                            <button type="button" class="btn btn-warning btn-sm edit_about" data-id=""><i class="fa fa-pencil fa-fw"></i> Edit</button>
                        </div>
                        <?php if(!isset($p)): ?>
                            <div class="row">
                                <div class="col-12"><div class="alert alert-danger alert-dismissible fade show" role="alert"> No data found in database</div></div>
                            </div>
                        <?php else: ?>
                        <div class="row">
                        <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <div class="card border-0" width="100%">
                                <div class="card-body">
                                    <section class="container about-sect px-5">
                                        <div class="row justify-around align-items-center">
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <h2 class="text-gray font-bold">
                                                <span class="text-green"><?php echo e($p->Page->page_name); ?></span>
                                                </h2>
                                                <p>
                                                <?php echo $p->description; ?>

                                                </p>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <img src="<?php echo e(asset('storage/images/about/'.$p->Page->media)); ?>" alt="" width="100%">
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        <?php endif; ?>
					</div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="video_modal_edit" tabindex="-1"  data-bs-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Edit About</h5>
                    <button class="btn-close" type="button"   data-bs-dismiss="modal" ></button>
                </div>
                <div class="modal-body" id="edit_about_body">
                </div>
            </div>
        </div>
    </div>


       <?php $__env->startPush('scripts'); ?>
       <script src="<?php echo e(asset('assets/js/sweet-alert/sweetalert.min.js')); ?>"></script>
    <script>
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


                $("#create_partner").click(function(){
                    $('#partner_modal_create').modal('show');
                    $('#partner_modal_create').on('hidden.bs.modal', function () {
                        $(this).find('form').trigger('reset');
                        $(this).find('#preview').addClass('d-none');
                    })
                });

    var ext = this.files[0].name.split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
        $('#alert_ext').removeClass("d-none");
        $('#preview').addClass("d-none");

        }else{
            $('#alert_ext').addClass("d-none");
        }
         });
    }




        $(document).on('click', '#create_partner', function(event) {
event.preventDefault();
$.ajax({
    url: "/admin/partner/create/",
    beforeSend: function() {
        $('#loader').show();
    },
    // return the result
    success: function(result) {

        $('#partner_modal_create').modal("show");
        $('#create_partner_body').html(result).show();
        view_image("create");
    },

})
});







$(document).on('click', '.update_partner', function(event) {

event.preventDefault();

var id = $(this).data('id');
$.ajax({
    url: "/admin/partner/edit/" + id,
    beforeSend: function() {
        $('#loader').show();
    },
    // return the result
    success: function(result) {

        $('#partner_modal_update').modal("show");
        $('#edit_partner_body').html(result).show();
        view_image("update");
        delete_image();

    },

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


$(document).on('click', '#delete_partner', function(){
                    var id = $(this).attr('data-id');
                    swal({
                        title: "Delete Partner?",
                        text: "Once deleted, you will not be able to recover Delete Partner",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: '/admin/partner/delete',
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
                            })
                        }
                        })
                    })

            

            $(document).on('click', '.edit_about', function(event) {
                swal({
                    title: "Edit About Page?",
                    text: "Are you sure you want to edit About Page?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willEdit) => {
                    if (willEdit) {
                        event.preventDefault();
                        window.location.href = "/admin/about/edit";
                        // var id = $(this).data('id');
                        // $.ajax({
                        //     url: "/admin/about/edit",
                        //     beforeSend: function() {
                        //         $('#loader').show();
                        //     },
                        //     // return the result
                        //     success: function(result) {

                        //         $('#video_modal_edit').modal("show");
                        //         $('#edit_about_body').html(result).show();

                        //     },
                        // })
                    }
                })
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    if(input.files[0].size <= 5000000){
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#photoPreview').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                    else{
                        $('#photoPreview').attr('src', "");
                    }
                }
                else{
                    $('#photoPreview').attr('src', "");
                }
            }

            $(document).on('change', '#photo', function(){
                readURL(this);
                for(var i=0; i< $(this).get(0).files.length; ++i){
                    var file1 = $(this).get(0).files[i].size;
                    if(file1){
                        var file_size = $(this).get(0).files[i].size;
                        if(file_size > 5000000){
                            $('#photoPreview').attr('src', "");
                            $('#photo_fb').html("File photo size is larger than 5MB");
                            $('#photo').addClass('is-invalid');
                        }else{
                            $('#photo_fb').html("");
                            $('#photo').removeClass('is-invalid');
                        }
                    }
                }
            });

    </script>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tekenens_project\resources\views/admin/about/show.blade.php ENDPATH**/ ?>