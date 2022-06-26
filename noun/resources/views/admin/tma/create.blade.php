@extends('layout.layout')
@section('content')

<x-header>
<x-header.heading>
    TMA Test
</x-header.heading>
</x-header>
<div class="card shadow mb-4">

    <div class="card-body">
        <form method="POST" action="{{ route('admin.tma.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="my-select">Select Course</label>
                <select id="my-select" class="form-control" name="course">
                    @foreach ($data['courses'] as $course)
                        <option value="{{ $course->id }}">{{ $course->code . "-" . $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3"><label>Tma file:</label>
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
