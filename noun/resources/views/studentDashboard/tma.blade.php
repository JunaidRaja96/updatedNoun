@extends('layout.student-layout')

@section('content')

<header class="bg-gradient-primary py-5 mb-5">

    <div class="row">
        <div class="col-md-8 mx-auto">
                <div class="border-0 mb-4 ">
                    <form method="get" action="{{ route('student.tma') }}">
                        <div class="input-group  d-flex align-content-between ">
                            <input type="text" class="form-control" placeholder="Search TMA TEST" name="search">
                            <div class="input-group-append">
                                <select class="custom-select" name="course">
                                    <option value="" selected>Select Code</option>
                                    @foreach ($data['courses'] as $course)
                                        <option value="{{ $course }}">{{ $course }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i>&nbsp;Search
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</header>
<div class="card shadow mb-4">
    <div class="card-header">
        <h3 class="text-center">Search Result</h3>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @if (isset($data['result'][0]))
                @foreach ($data['result'] as $result)
                    <li class="list-group-item">
                        <h6 class="badge badge-primary p-2">{{ $result->course }}</h6>
                        <h4><strong>Question: </strong>{{ $result->question }}</h4>
                        <h4><strong>Answer: </strong><span class="text-success">{{ $result->answer }}</span></h4>
                    </li>
                @endforeach
            @else
                <h4 class="text-center text-danger font-weight-bold">No results found</h4>
            @endif
        </ul>
    </div>
</div>

@endsection
