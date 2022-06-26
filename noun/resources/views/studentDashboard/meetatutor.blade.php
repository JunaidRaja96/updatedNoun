@extends('layout.student-layout')

@section('content')
<div class="row">

    <div class="col-lg-8">

        <div class="row">
            @foreach ($records as $record)
                <div class="col-lg-6 mb-4">
                    <!-- Blog post-->
                    <div class="card  h-100">
                        <div class="card-body">
                            <h2 class="card-title h4">Tutor Name : {{$record->user->name}}</h2>
                            <h2 class="card-title h4">Course : {{$record->course->title}}</h2>
                            <p class=" card-text">Days:{{$record->select_days}}</p>
                            <p class=" card-text">to:{{date("h:i:a",strtotime($record->to))}} from:{{date("h:i:a",strtotime($record->from))}}</p>
                            <p class=" card-text">link:{{$record->link}}</p>
                            <form method="post" action="{{route('student.sentrequest')}}">
                                @csrf
                                <input type="hidden" name="tutor_course_id" value="{{$record->id}}">
                                <button class="btn btn-primary" type="submit" >Enroll</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Side widgets-->
    <div class="col-lg-4">
        <!-- Search widget-->
        {{-- <div class="card mb-4">
            <div class="card-header">Search</div>
            <div class="card-body">
                <form method="get" action="{{route('student.meetatutor')}}">
                    <div class="input-group">
                        <div class="form-inline">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." name="search" aria-describedby="button-search" value="{{request()->get('search')}}"/>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="button-search" type="submit">Go</button>
                            @if(request()->get('search'))
                                <a  href="{{route('student.meetatutor')}}" class="btn btn-danger">Clear</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}
        <!-- Categories widget-->
        <div class="card mb-4">
            <div class="card-header">Course</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                            <span><a href="{{route('student.meetatutor')}}" class="badge badge-pill badge-primary p-2">All</a></span>
                         @foreach ($course_detail as $detail)
                            <span><a href="{{route('student.meetatutor').'?course='.$detail->id}}" class="badge badge-pill badge-primary  p-2 m-2">{{$detail->title}}</a></span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Side widget-->
        {{-- <div class="card mb-4">
            <div class="card-header">Side Widget</div>
            <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
        </div> --}}
    </div>
</div>
@endsection
