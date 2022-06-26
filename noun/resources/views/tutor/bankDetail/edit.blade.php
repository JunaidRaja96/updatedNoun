@extends('layout.layout')
@section('content')
<x-header>
    <x-header.heading>
      Edit  Bank Detail
    </x-header.heading>
    <p class="invalid-feedback text-danger"></p>
</x-header>
<div class="card shadow mb-4">

    <div class="card-body">
        <form method="POST" action="{{route('bankdetail.update',$data->id)}}" >
            @csrf
            @method('put')
            <div class="mb-3"><label>Bank Name</label>
                <input class="form-control" name="bankname" value="{{$data->bank_name}}" type="text">
                @error('bankname')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3"><label>Account Name</label>
                <input class="form-control" name="accountname" value="{{$data->account_name}}" type="text">
                @error('accountname')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3"><label>Account Number</label>
                <input class="form-control" name="accountnumber" value="{{$data->account_number}}" type="number">
                @error('accountnumber')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input type="submit"  class=" m-0 btn btn-primary" style="float:right" value="Update Bank Detail">
            </div>
        </form>
    </div>
</div>

@endsection

