@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Edit Blog Categories</x-header>
    </x-header>

<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.categories.update',['category' => $data->id]) }}">
            @method('PATCH')
            @csrf
            <div class="mb-3"><label>Name:</label>
                <input class="form-control @error('category') is-invalid @enderror" name="category" value="{{ $data->name }}" type="text" placeholder="Category name">
                @error('category')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-2">
                <input class="m-0 btn btn-primary float-right" type="submit" value="Edit Category">
            </div>
        </form>
    </div>
</div>

@endsection
