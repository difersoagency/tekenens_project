@extends('layouts.admin.master')

@section('title')Teams
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Teams</h3>
		@endslot
		<li class="breadcrumb-item active">Teams</li>
	@endcomponent

    <div class="container-fluid user-card">
	    <div class="row">
	        <div class="col-md-2 col-lg-2 col-xl-2 box-col-2">
	            <div class="card custom-card">
                    <a class="btn btn-primary" type="button" href="{{route('team.create')}}">Create</a>
	            </div>
	        </div>
	    </div>
	</div>


    <div class="container-fluid user-card">
	    <div class="row">
            @foreach ($data as $d )
	        <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
	            <div class="card custom-card">
                    <div class="card-profile">
                        @if($d->path)
                        <img class="rounded-circle"   src="{{asset('storage/'. substr($d->path,7))}}"  alt="" />
                        @else
                        <img class="rounded-circle"  src="{{asset('assets/images/dashboard/1.png')}}"  alt="" />
                        @endif
                    </div>
	                <div class="text-center profile-details">
	                   <h4>{{$d->name}}</h4>
	                    <h6>{{$d->role}}</h6>
	                </div>
	                <div class="card-footer row">
	                    <div class="col-6 col-sm-6">
                            <a href="{{route('team.edit',$d->id)}}" class="btn btn-primary" type="button">Edit</a>
	                    </div>
	                    <div class="col-6 col-sm-6">
                            <button class="btn btn-danger" type="button">Delete</button>
	                    </div>
	                </div>
	            </div>
	        </div>
    @endforeach
	    </div>
	</div>


	@push('scripts')
	@endpush

@endsection
