@extends('layout.layout')
@section('content')


<div class="row">

    <div class="col-lg-8">

        <div class="row">
            @foreach ($data['tutor_courses'] as $record)
                <div class="col-lg-6 mb-4">
                    <!-- Blog post-->
                    <div class="card  h-100">
                        <div class="card-body">
                            <h2 class="card-title h4">{{$record->course->title}}</h2>
                            @if (isset($data['studentTutorCourse'][$record->course->id]))
                                <ul class="list-group list-group">
                                    <li class="list-group-item active">Enrolled Students:</li>
                                    @foreach ($data['studentTutorCourse'][$record->course->id] as $student)
                                        <li class="list-group-item">{{ $student['name'] }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <small class="text-muted">No Student Enrolled yet</small>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
