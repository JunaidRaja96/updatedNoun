@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Create Semester</x-header>
    </x-header>

<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.semester.store') }}">
            @csrf
            <div class="mb-3"><label>Year:</label>
                <input type="text" class="form-control" name="year" id="datepicker" placeholder="Enter Year"/>
                @error('year')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>No of Semester :</label>
                <input type="number" class="form-control" min="1" max="8" name="semester"  placeholder="Enter No of Semester"/>
                @error('semester')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2">
                <input class="m-0 btn btn-primary float-right" type="submit" value="Add Semester">
            </div>
        </form>
    </div>
</div>

@endsection
