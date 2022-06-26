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
            <x-header.heading>Subscription</x-header>
        </x-header>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="steps">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="step-item">
                                    <button class="step-button text-center text-white bg-primary">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <div class="step-title d-none d-sm-block">
                                        Details
                                    </div>
                                </div>
                                <div class="step-item">
                                    <button class="step-button text-center text-white bg-primary">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <div class="step-title d-none d-sm-block">
                                        Preferences
                                    </div>
                                </div>
                                <div class="step-item">
                                    <button class="step-button text-center text-white bg-primary">
                                        3
                                    </button>
                                    <div class="step-title d-none d-sm-block">
                                        Payment
                                    </div>
                                </div>
                        </div>

                        <form method="POST" action="{{ route('student.subscription.step3.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Account Name:</label>
                                <input class="form-control" type="text" name="account_name">
                            </div>
                            <div class="form-group">
                                <label>Account Number:</label>
                                <input class="form-control" type="number" name="account_number">
                            </div>
                            <div class="form-group">
                                <label>Bank Name:</label>
                                <input class="form-control" type="text" name="bank">
                            </div>
                            <hr>
                            <input class="btn btn-primary float-right" type="submit" value="Next Step">
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
