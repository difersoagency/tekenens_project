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

              <div class="col-sm-12 col-lg-6 col-xl-8 xl-50 col-md-12 box-col-6">
                <div class="card height-equal">
                    <div class="contact-form card-body">
                    <form action="{{route('update.contact',$data->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputName">Description</label>
                                <textarea class="form-control textarea" rows="3" cols="50" placeholder="Office Address" name="description">{{$data->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputName">Address</label>
                                <textarea class="form-control textarea" rows="3" cols="50" placeholder="Office Address" name="address">{{$data->address}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="exampleInputEmail1">Email</label>
                                <input class="form-control" id="exampleInputEmail1" type="email" name="email" placeholder="Demo@gmail.com" value="{{$data->email}}">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="exampleInputEmail1">Whatsapp</label>
                                <input class="form-control" id="exampleInputEmail1" type="number" name="whatsapp" placeholder="08123456789" value="{{$data->whatsapp}}">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="exampleInputEmail1">Instagram</label>
                                <input class="form-control" id="exampleInputEmail1" type="text" name="instagram" placeholder="ID Instagram" value="{{$data->instagram}}">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label" for="exampleInputEmail1">Youtube</label>
                                <input class="form-control" id="exampleInputEmail1" type="text" name="youtube" placeholder="Youtube Channel" value="{{$data->youtube}}">
                            </div>
                            <div class="text-sm-end">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>




            </div>
        </div>


	@push('scripts')
	@endpush

@endsection
