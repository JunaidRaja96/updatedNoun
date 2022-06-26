@extends('layout.auth')
@section('title')
Register | Noun
@endsection
@section('content')
<style>
.bg2-login-image
{
    background-image: url("{{asset('img/register.svg')}}");
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}

</style>
    <!-- Outer Row -->


    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg2-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Registration</h1>
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <form action="{{route('register.store')}}" method="post" class="user">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control form-control-user" placeholder="Enter Name...">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password"  class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation"  class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Confrim Password">
                                    </div>
                                    <div class="form-inline mb-4">
                                        <div class="form-group pl-2">
                                                        <input class="form-check-input" type="radio" name="role" id="student" value="student">
                                                        <label for="student">student</label>
                                        </div>
                                        <div class="form-group pl-4">
                                            <input class="form-check-input" type="radio" name="role" id="tutor" value="tutor">
                                            <label for="tutor">Teacher</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" required id="customCheck">
                                            <label class="custom-control-label" for="customCheck"><p><strong>Terms and Conditions:</strong> Only this device use for registration can have access to my noun loaded account</p></label>
                                        </div>
                                    </div>
                                    <input type="submit" value="Register"  class="btn btn-primary btn-user btn-block">


                                    {{-- <hr>
                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a> --}}
                                </form>
                                <hr>
                                <div class="text-center">
                                    {{-- <a class="small" href="forgot-password.html">Forgot Password?</a> --}}
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{route('auth.login')}}">Sign In</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

@endsection


