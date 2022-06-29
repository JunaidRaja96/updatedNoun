@extends('layout.student-layout')


@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .steps {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    position: relative;
    }
    .progress {
        -webkit-appearance: none;
        position: absolute;
        width: 95%;
        z-index: 5;
        height: 5px;
        margin-left: 18px;
        margin-bottom: 18px;
        vertical-align: baseline;
    }
    .step-item {
        z-index: 10;
        text-align: center;
    }
    .step-item {
        z-index: 10;
        text-align: center;
    }
    .step-button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: none;
        transition: .4s;
    }
</style>
@endsection


@section('content')
    <div class="container">
        <x-header>
            <x-header.heading>Edit Prefrences</x-header>
        </x-header>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('student.prefrenceUpdate') }}">
                            @csrf
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" {{$subscriptionData->tma_test ? 'checked':''}} id="customSwitch1" name="tma_test">
                                        <label class="custom-control-label" for="customSwitch1">TMA Submission</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch2" {{$subscriptionData->past_questions ? 'checked':''}} name="past_questions">
                                        <label class="custom-control-label" for="customSwitch2">Noun past questions</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch3" {{$subscriptionData->connect_with_tutor ? 'checked':''}} name="connect_with_tutor">
                                        <label class="custom-control-label" for="customSwitch3">Connect with a tutor</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch4" {{$subscriptionData->become_a_tutor ? 'checked':''}} name="become_a_tutor">
                                        <label class="custom-control-label" for="customSwitch4">Become a tutor</label>
                                    </div>
                                </li>
                            </ul>
                            <hr>
                            <input class="btn btn-primary float-right" type="submit" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@Section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select-2-courses').select2();
        });
    </script>
@endsection
