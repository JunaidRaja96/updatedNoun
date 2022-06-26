@extends('layout.layout')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<x-header>
    <x-header.heading>
        Edit Tutor Course Detail
    </x-header.heading>
    <p class="invalid-feedback text-danger"></p>
</x-header>
<div class="card shadow mb-4">

    <div class="card-body">
        <form method="POST" action="{{route('course.update',$data->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3"><label>Course Name</label>
                <select name="course_id" class="form-control">
                    <option value="" selected >Select Course</option>
                @foreach ($records as $record)
                    <option value="{{ $record->id }}" {{$record->id == $data->course_id ? 'selected':''}}>{{ $record->title }}</option>
                @endforeach
            </select>
            @error('course_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-3"><label>Working days in a week</label>
                 <select class="form-control-file js-example-basic-multiple" multiple="mulitple" name="days[]">
                    <option value="monday" {{in_array(" monday ",$allDay) == true ? 'selected' :''}}>Monday</option>
                    <option value="tuesday" {{in_array(" tuesday ",$allDay) == true ? 'selected':''}}>Tuesday</option>
                    <option value="wednesday" {{in_array(" wednesday ",$allDay) == true ? 'selected':''}}>Wednesday</option>
                    <option value="thursday" {{in_array(" thursday ",$allDay) == true ? 'selected':''}}>Thursday</option>
                    <option value="friday" {{in_array(" friday ",$allDay) == true ? 'selected':''}}>Friday</option>
                    <option value="saturday" {{in_array(" saturday ",$allDay) == true ? 'selected':''}}>Saturday</option>
                    <option value="sunday" {{in_array(" sunday ",$allDay) == true ? 'selected':''}}>Sunday</option>
                </select>


                @error('days')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>To</label>
                <input class="form-control-file" name="to" value="{{$data->to}}" type="time">
                @error('to')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>From</label>
                <input class="form-control-file" name="from" value="{{$data->from}}" type="time">
                @error('from')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>Contecting Link</label>
                <input class="form-control-file" name="link" value="{{$data->link}}" type="text">
            </div>
            <div>
                <input type="submit"  class=" m-0 btn btn-primary" style="float:right" value="Update Course Detail">
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

$(document).ready(function() {

    $('.js-example-basic-multiple').select2();
});
</script>
@endsection
