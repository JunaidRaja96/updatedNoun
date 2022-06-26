@extends('layout.layout')
@section('content')

<x-header>
<x-header.heading>
    Past Questions
</x-header.heading>
</x-header>
<div class="card shadow mb-4">

    <div class="card-body">
        <form method="POST" action="{{ route('admin.pastquestion.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="my-select">Select Semester</label>
                <select id="my-select" class="form-control" name="semester">
                    @foreach ($data['semesters'] as $semester)
                        <option value="{{ $semester->id }}">{{ $semester->year . "_" . $semester->semester_no }}</option>
                    @endforeach
                </select>
                <label for="my-select">Select Course</label>
                <select id="my-select" class="form-control" name="course">
                    @foreach ($data['courses'] as $course)
                        <option value="{{ $course->id }}">{{ $course->code . "-" . $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3"><label>Past Questions</label>
                <input class="form-control" name="file" type="file">
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" id="addblog" class=" m-0 btn btn-primary" style="float:right" value="Upload">
        </form>
    </div>
</div>
@endsection
