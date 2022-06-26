@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Create Course</x-header>
    </x-header>

<div class="card shadow mb-4">

    <div class="card-body">
        <form method="POST" action="{{ route('admin.course.store') }}">
            @csrf
            <div class="mb-3"><label>Title:</label>
                <input class="form-control" name="title" value="{{ old('title') }}" type="text" placeholder="Title">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>Code:</label>
                <input class="form-control" name="code" value="{{ old('code') }}" type="text" placeholder="Course">
                @error('code')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-2">
                <input class="m-0 btn btn-primary float-right" type="submit" value="Add Course">
            </div>
        </form>
    </div>
</div>

@endsection
