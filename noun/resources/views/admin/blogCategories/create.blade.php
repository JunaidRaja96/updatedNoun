@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Create Blog Categories</x-header>
    </x-header>

<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="mb-3"><label>Name:</label>
                <input class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" type="text" placeholder="Category name">
                @error('category')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-2">
                <input class="m-0 btn btn-primary float-right" type="submit" value="Add Category">
            </div>
        </form>
    </div>
</div>

@endsection
