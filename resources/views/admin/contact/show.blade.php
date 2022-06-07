@extends('layouts.admin.master')

@section('title')Contact
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Contact</h3>
		@endslot
		<li class="breadcrumb-item active">Contact</li>
	@endcomponent
     <div class="container-fluid">
            <div class="row">
                @if(Session::has('error')  )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('error') }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
                @if(Session::has('success')  )
                <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('success') }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif


              @foreach ($data as $d )
              @if ($loop->first)
                <div class="col-sm-6 col-xl-3 xl-50 col-lg-6 box-col-6">
                    <div class="card social-widget-card">
                          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <a class="setting-primary" id="edit_email" type="button" ><i class="fa fa-pencil-square-o"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>



                        <div class="card-body">
                            <div class="redial-social-widget"><i class="fa fa-envelope font-primary"></i></div>
                            <h5 class="b-b-light">Email</h5>
                            <div class="row">
                                <div class="col text-center b-r-light">
                                    <div id ="show_email_form">
                                    <h4 class="counter mb-0">{{$d->email}}</h4>
                                    </div>
                                    <div id ="edit_email_form" class="d-none" >
                                    <form action="{{route('update.contact',['type'=> 'email','id' => $d->id ])}}" method="POST">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <input class="form-control" type="email" name="email" data-original-value="{{$d->email}}" id="email" value="{{$d->email}}" />
                                    <br>
                                    <button class="btn btn-secondary" type="submit" id="submit_email">Update</button>
                                    <button class="btn btn-primary" type="button"  id="cancel_email" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <div class="col-sm-6 col-xl-3 xl-50 col-lg-6 box-col-6">
                    <div class="card social-widget-card">
                          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <a class="setting-primary" id="edit_phone_number" type="button" ><i class="fa fa-pencil-square-o"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <div class="card-body">
                            <div class="redial-social-widget"><i class="fa fa-whatsapp font-primary"></i></div>
                            <h5 class="b-b-light">Phone</h5>
                            <div class="row">
                                <div class="col text-center b-r-light">
                                    <div id ="show_phone_number_form">
                                    <h4 class="counter mb-0">{{$d->phone_number}}</h4>
                                    </div>
                                    <div id ="edit_phone_number_form" class="d-none" >
                                    <form action="{{route('update.contact',['type'=> 'phone_number','id' => $d->id ])}}" method="POST">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <input class="form-control" type="number" name="phone_number" data-original-value="{{$d->phone_number}}" id="phone_number" value="{{$d->phone_number}}" />
                                    <br>
                                    <button class="btn btn-secondary" type="submit" id="submit_phone_number">Update</button>
                                    <button class="btn btn-primary" type="button"  id="cancel_phone_number" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 xl-50 col-lg-6 box-col-6">
                    <div class="card social-widget-card">
                          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <a class="setting-primary" id="edit_instagram" type="button" ><i class="fa fa-pencil-square-o"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <div class="card-body">
                            <div class="redial-social-widget"><i class="fa fa-instagram font-primary"></i></div>
                            <h5 class="b-b-light">INSTAGRAM</h5>
                            <div class="row">
                                <div class="col text-center b-r-light">
                                    <div id ="show_instagram_form">
                                    <h4 class="counter mb-0">{{$d->instagram}}</h4>
                                    </div>
                                    <div id ="edit_instagram_form" class="d-none" >
                                    <form action="{{route('update.contact',['type'=> 'instagram','id' => $d->id ])}}" method="POST">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <input class="form-control" type="text" name="instagram" data-original-value="{{$d->instagram}}" id="instagram" value="{{$d->instagram}}" />
                                    <br>
                                    <button class="btn btn-secondary" type="submit" id="submit_instagram">Update</button>
                                    <button class="btn btn-primary" type="button"  id="cancel_instagram" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{-- Space --}}
                {{-- <div class="col-sm-6 col-xl-3 xl-50 col-lg-6 box-col-6">
                    <div class="card social-widget-card">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <div class="setting-list">
                                <ul class="list-unstyled setting-option">
                                    <li>
                                        <a href="" class="setting-primary"><i class="fa fa-pencil-square-o"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="redial-social-widget" ><i class="fa fa-map-marker font-primary"></i></div>
                            <h5 class="b-b-light">Address</h5>
                            <div class="row">
                                <div class="col text-center b-r-light">
                                    <h4 class="counter mb-0">admin@gmail.com</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
{{-- Space --}}

                <div class="col-sm-6 col-xl-3 xl-50 col-lg-6 box-col-6">
                    <div class="card social-widget-card">
                          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <div class="setting-list">
                                    <ul class="list-unstyled setting-option">
                                        <li>
                                            <a class="setting-primary" id="edit_address" type="button" ><i class="fa fa-pencil-square-o"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <div class="card-body">
                            <div class="redial-social-widget"><i class="fa fa-map-marker font-primary"></i></div>
                            <h5 class="b-b-light">Address</h5>
                            <div class="row">
                                <div class="col text-center b-r-light">
                                    <div id ="show_address_form">
                                    <h4 class="counter mb-0">{{$d->address}}</h4>
                                    </div>
                                    <div id ="edit_address_form" class="d-none" >
                                    <form action="{{route('update.contact',['type'=> 'address','id' => $d->id ])}}" method="POST">
                                        @csrf
                                        {{method_field('PUT')}}
                                        <input class="form-control" type="text" name="address" data-original-value="{{$d->address}}" id="address" value="{{$d->address}}" />
                                    <br>
                                    <button class="btn btn-secondary" type="submit" id="submit_address">Update</button>
                                    <button class="btn btn-primary" type="button"  id="cancel_address" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


	@push('scripts')
<script>
        $(document).ready(function () {
            $('#edit_email').on('click', function() {
                $("#edit_email_form").removeClass('d-none');
                $("#show_email_form").addClass('d-none');
            });
            $('#cancel_email').on('click', function() {
                var email_restore = $("#email");
                $("#edit_email_form").addClass('d-none');
                $("#show_email_form").removeClass('d-none');
                email_restore.val(email_restore.data("original-value"));
            });

            $('#email').on('keyup change', function() {
            if ($(this).val() != '') {
                    $('#submit_email').attr("disabled", false);
            } else {
                $('#submit_email').attr("disabled", true);
            }
           });



           $('#edit_instagram').on('click', function() {
                $("#edit_instagram_form").removeClass('d-none');
                $("#show_instagram_form").addClass('d-none');
            });
            $('#cancel_instagram').on('click', function() {
                var instagram_restore = $("#instagram");
                $("#edit_instagram_form").addClass('d-none');
                $("#show_instagram_form").removeClass('d-none');
                instagram_restore.val(instagram_restore.data("original-value"));
            });

            $('#instagram').on('keyup change', function() {
            if ($(this).val() != '') {
                    $('#submit_instagram').attr("disabled", false);
            } else {
                $('#submit_instagram').attr("disabled", true);
            }
           });


           $('#edit_phone_number').on('click', function() {
                $("#edit_phone_number_form").removeClass('d-none');
                $("#show_phone_number_form").addClass('d-none');
            });
            $('#cancel_phone_number').on('click', function() {
                var phone_number_restore = $("#phone_number");
                $("#edit_phone_number_form").addClass('d-none');
                $("#show_phone_number_form").removeClass('d-none');
                phone_number_restore.val(phone_number_restore.data("original-value"));
            });

            $('#phone_number').on('keyup change', function() {
            if ($(this).val() != '') {
                    $('#submit_phone_number').attr("disabled", false);
            } else {
                $('#submit_phone_number').attr("disabled", true);
            }
           });


           $('#edit_address').on('click', function() {
                $("#edit_address_form").removeClass('d-none');
                $("#show_address_form").addClass('d-none');
            });
            $('#cancel_address').on('click', function() {
                var address_restore = $("#address");
                $("#edit_address_form").addClass('d-none');
                $("#show_address_form").removeClass('d-none');
                address_restore.val(address_restore.data("original-value"));
            });

            $('#address').on('keyup change', function() {
            if ($(this).val() != '') {
                    $('#submit_address').attr("disabled", false);
            } else {
                $('#submit_address').attr("disabled", true);
            }
           });
    });

</script>
	@endpush

@endsection
