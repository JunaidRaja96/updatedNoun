@extends('layout.student-layout')

@section('content')
<div class="row">

    <div class="col-lg-8">

        <div class="row">
            @foreach ($tuturrecords as $record)
                <div class="col-lg-6 mb-4">
                    <!-- Blog post-->
                    <div class="card  h-100">
                        <div class="card-body">
                            <h2 class="card-title h4">Tutor Name : {{$record->user->name}}</h2>
                            <h2 class="card-title h4">Tutor Email : {{$record->user->email}}</h2>
                            <a href="{{route('home')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
