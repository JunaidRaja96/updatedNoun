@extends('layout.layout')
@section('content')
<x-header>
    <x-header.heading>
        Bank Detail
    </x-header.heading>
    <p class="invalid-feedback text-danger"></p>
</x-header>
<div class="card shadow mb-4">

    <div class="card-body">
        <form method="POST" action="{{route('bankdetail.store')}}" >
            @csrf
            <div class="mb-3"><label>Bank Name</label>
                <input class="form-control" name="bankname" type="text">
                @error('bankname')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3"><label>Account Name</label>
                <input class="form-control" name="accountname" type="text">
                @error('accountname')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>Account Number</label>
                <input class="form-control" name="accountnumber" type="number">
                @error('accountnumber')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input type="submit"  class=" m-0 btn btn-primary" style="float:right" value="Add Course Detail">
            </div>
        </form>
    </div>
</div>

@endsection

