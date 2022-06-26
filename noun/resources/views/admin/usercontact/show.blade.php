@extends('layout.layout')

@section('content')
<x-header>
    <x-header.heading>User Contact</x-header>
</x-header>
<div class="card  h-100">
    <div class="card-header">
        <h3>Name: {{$data->name}}</h3>
    </div>
    <div class="card-body">
        <div class="small text-muted"></div>
        <h4 class="card-title h4">Email: {{$data->email}}</h4>
        <h4 class="card-text">Phone: {{$data->phone_number}}</h4>
        <p class="card-text">Message: {{$data->message}}</p>
    </div>
</div>


@endsection
