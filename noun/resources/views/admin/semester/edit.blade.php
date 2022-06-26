@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Edit Semester </x-header>
    </x-header>

<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.semester.update',$record->id) }}">
            @csrf
            @method('put')
            {{-- <div class="mb-3"><label>Year:</label>
                <input type="text" class="form-control" name="datepicker" value="{{$record->year}}" id="datepicker" placeholder="Enter Year"/>
                @error('datepicker')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}
            {{-- <div class="mb-3"><label>No of Semester :</label>
                <input type="number" class="form-control" min="1" max="8" value="{{$record->semester_no}}" name="semester"  placeholder="Enter No of Semester"/>
                @error('semester')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> --}}
            <div class="mb-3"><label>Status :</label>
                <select class="custom-select" name="status">
                    <option selected>Select Status</option>
                    <option value="1" {{'1'== $record->status ? 'selected':''}}>Active</option>
                    <option value="0" {{'0'== $record->status ? 'selected':''}}>InActive</option>
                </select>
            </div>

            <div class="mt-2">
                <input class="m-0 btn btn-primary float-right" type="submit" value="Update Semester">
            </div>
        </form>
    </div>
</div>

@endsection
