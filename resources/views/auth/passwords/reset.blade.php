@extends('admin.authentication.master')

@section('title')Forget Password
 {{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
@endpush

@section('content')
    <section>
	    <div class="container-fluid p-0">
	        <div class="row m-0">
	            <div class="col-12 p-0">
	                <div class="login-card">
	                    <div class="login-main">
                            <div  class="theme-form login-form">
                            @if(Session::has('success')  )
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">{{ Session::get('success') }}
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                          @endif

                            @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('error') }}
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                          @endif
                            @if(Session::has('duplicate'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">{{ Session::get('duplicate') }}
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                          @endif
	                        <form action="{{route('forget_pwd.post')}}" method="POST">
                                @csrf
	                            <h4 class="mb-3">Reset Your Password</h4>
	                            <div class="form-group">
	                                <label>Enter your email address below to reset password</label>
	                                <div class="row">
	                                    <div class="col-12 col-sm-12">
	                                        <input class="form-control" type="text" placeholder="Email address" name="email" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <button class="btn btn-primary btn-block" type="submit">Send</button>
	                            </div>

	                            <p>Already have an password?<a class="ms-2" href="{{ route('login') }}">Sign in</a></p>
	                        </form>
	                    </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>



@endsection
