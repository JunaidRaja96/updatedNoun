@extends('layout.layout')
@section('content')
<style>
    .bg3-login-image
    {
        background-image: url("{{asset('img/undraw_profile_details_re_ch9r.svg')}}");
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;

    }

    </style>
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow my-5">
            <div class="card-body p-5">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg3-login-image "></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-inline">
                                <h1 class="h4 text-gray-900 mb-2">Name: {{auth()->user()->name}}</h1>
                                <h1 class="h4 text-gray-900 mb-2">Email: {{auth()->user()->email}}</h1>
                                <h1 class="h4 text-darke mb-2">Change Password</h1>
                                <form action="{{route('changepassword')}}" method="post" class="user">
                                    @csrf

                                    <div class="form-group">
                                        <input type="password" name="password"  class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation"  class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Confrim Password">
                                    </div>
                                    <div class="form-inline">
                                        <input type="submit" value="Change Password"  class="btn btn-primary btn-user btn-block">
                                        <a href="{{route('home')}}" class="btn btn-link mt-3">Back</a>

                                    </div>
                                </form>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
