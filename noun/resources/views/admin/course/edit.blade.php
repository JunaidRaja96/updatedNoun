@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Edit Course</x-header>
    </x-header>

<div class="card shadow mb-4">

    <div class="card-body">
        <form method="POST" action="{{ route('admin.course.update',$record->id) }}">
            @csrf
            @method('put')
            <div class="mb-3"><label>Title:</label>
                <input class="form-control" name="title" value="{{ $record->title }}" type="text" placeholder="Title">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>Code:</label>
                <input class="form-control" name="code" value="{{ $record->code }}" type="text" placeholder="Course">
                @error('code')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>Status :</label>
                <select class="custom-select" name="status">
                    <option selected>Select Status</option>
                    <option value="1" {{'1'== $record->status ? 'selected':''}}>Active</option>
                    <option value="0" {{'0'== $record->status ? 'selected':''}}>InActive</option>
                </select>
            </div>

            <div class="mt-2">
                <input class="m-0 btn btn-primary float-right" type="submit" value="Update Course">
            </div>
        </form>
    </div>
</div>

@endsection
