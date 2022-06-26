@extends('layout.layout')

@section('content')
    <x-header>
        <x-header.heading>Students</x-header>
    </x-header>

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    {{-- <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$data['user']->name}}</td>
                                    <td>{{$data['user']->email}}</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                    <!-- Blog post-->
                    <div class="card  h-100">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Student Subscription</h6>
                    </div>
                        <div class="card-body">
                            <h2 class="card-title h4">Account Name : {{$data['studentsub']->account_name ?? null}}</h2>
                            <h2 class="card-title h4">Account Number : {{$data['studentsub']->account_number ?? null}}</h2>
                            <h2 class="card-title h4">Bank Name : {{$data['studentsub']->bank ?? null }}</h2>
                            <select class="form-control" name="forma" onchange="location = this.value;">
                                <option value="{{route('admin.student.subscribestatus',$data['user']->id)}}" {{ ($data['user']->subscribed ==1) ? 'selected' : '' }}>Active</option>
                                <option value="{{route('admin.student.subscribestatus',$data['user']->id)}}" {{ ($data['user']->subscribed ==0) ? 'selected' : '' }}>InActive</option>
                            </select>
                        </div>
                    </div>


            </div>
        </div>
    </div>
</div>

@endsection
