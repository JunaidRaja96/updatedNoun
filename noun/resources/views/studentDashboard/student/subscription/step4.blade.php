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
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <div class="step-title d-none d-sm-block">
                                        Payment
                                    </div>
                                </div>
                        </div>

                        <pre>
                        kindly send us your email or whatsapp us for activation of your account
                        Email: <a href="mailto:info@tmaloaded.com">info@tmaloaded.com</a>
                        Whatsapp: <a href="tel:2347838383833">2347838383833</a>
                        </pre>

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
