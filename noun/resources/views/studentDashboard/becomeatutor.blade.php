@extends('layout.student-layout')
@section('content')
<style>
    .bg3-login-image
    {
        background-image: url("{{asset('img/undraw_teaching_re_g7e3.svg')}}");
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
                            @if(session('message'))
                            <div class="alert alert-success">{{session('message')}}</div>
                             @endif
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">Become a Tutor</h1>
                                <p>Share you knowledge</p>
                                <form method="post" action="{{route('student.becomeatutor.store')}}">
                                    @csrf
                                    <input type="hidden" name="tutor_also" value="1">
                                    <input type="submit" class=" text-center btn btn-primary btn-lg" value="Agree">
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
