@extends('admin.authentication.master')

@section('title')Login
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
    <section>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="login-card">
                    <div  class="theme-form login-form">
                        {{-- <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect email or password
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> --}}
                        {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">Your password has been changed
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> --}}
                        @if(Session::has('error')  )
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('error') }}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif
                        @if(Session::has('logout')  )
                        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('logout') }}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif
                        @if(Session::has('change_pwd')  )
                        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('change_pwd') }}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h4>Login</h4>
                        <h6>Welcome back! Log in to your account.</h6>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-email"></i></span>
                                <input class="form-control" type="email" required="" name="email" placeholder="Your email address" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon-lock"></i></span>
                                <input class="form-control" type="password" name="password" required="" placeholder="*********" />
                                <div class="show-hide"><span class="show"> </span></div>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div class="checkbox">
                                {{-- <input id="checkbox1" type="checkbox" />
                                <label for="checkbox1">Remember password</label> --}}
                            </div>
                            <a class="link" href="{{route('forget_pwd.show')}}">Forgot password?</a>
                        </div>
                        <div class="form-group float-right">
                            <button class="btn btn-primary btn-block float-left" type="button">Back to website</button>
                            <button class="btn btn-primary btn-block float-right" type="submit">Sign In</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    @push('scripts')
    @endpush

@endsection

