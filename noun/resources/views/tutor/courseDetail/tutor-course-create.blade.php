@extends('layout.layout')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
@endsection
@section('content')
<x-header>
    <x-header.heading>
        Create Tutor Course Detail
    </x-header.heading>
    <p class="invalid-feedback text-danger"></p>
</x-header>
<div class="card shadow mb-4">

    <div class="card-body">
        <form method="POST" action="{{route('course.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3"><label>Course Name</label>
                <select name="course_id" class="form-control">
                    <option value="" selected >Select Course</option>
                @foreach ($records as $record)
                    <option value="{{ $record->id }}">{{ $record->title }}</option>
                @endforeach
            </select>
            @error('course_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-3"><label>Working days in a week</label>
                <select class="select" multiple id="choices-multiple-remove-button" name="days[]">
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                  </select>

                @error('days')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>To</label>
                <input class="form-control-file" name="to" type="time">
                @error('to')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>From</label>
                <input class="form-control-file" name="from" type="time">
                @error('from')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>Contecting Link</label>
                <input class="form-control-file" name="link" type="text">
            </div>
            <div>
                <input type="submit"  class=" m-0 btn btn-primary" style="float:right" value="Add Course Detail">
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script>
$(document).ready(function(){

    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
       removeItemButton: true,
       maxItemCount:5,
       searchResultLimit:5,
       renderChoiceLimit:5
     });


});
</script>
@endsection
