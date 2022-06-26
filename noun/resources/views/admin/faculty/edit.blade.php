@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Create Faculty</x-header>
    </x-header>

<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.faculty.update',$record->id) }}">
            @csrf
            @method('put')
            <div class="mb-3"><label>Name:</label>
                <input class="form-control" name="name"  value="{{ $record->name }}" type="text" placeholder="Faculty name">
                @error('name')
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
                <input class="m-0 btn btn-primary float-right" type="submit" value="Update Faculty">
            </div>
        </form>
    </div>
</div>

@endsection
