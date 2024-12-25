@extends('layouts.master')
@section('title', __('Statistics'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Statistics') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Statistics') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <h4>
                                    {{ __('Gender') }}
                                </h4>
                                <canvas id="genderStats" class="h-275"></canvas>
                            </div>
                            <div class="col-md-6 text-center">
                                <h4>
                                    {{ __('Family') }}
                                </h4>
                                <canvas id="familyStats" class="h-275"></canvas>
                            </div>
                            <div class="col-md-6 text-center">
                                <h4>
                                    {{ __('Status') }}
                                </h4>
                                <canvas id="statusStats" class="h-275"></canvas>
                            </div>
                            <div class="col-md-6 text-center">
                                <h4>
                                    {{ __('Color') }}
                                </h4>
                                <canvas id="colorStats" class="h-275"></canvas>
                            </div>
                            <div class="col-md-12 text-center">
                                <h4>
                                    {{ __('Eye') }}
                                </h4>
                                <canvas id="eyeStats" class="h-275"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- CONTAINER CLOSED -->
@endsection

@push('plugin-scripts')
    <!-- CHARTJS JS -->
    <script src="{{ asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <script>
        var genderStats = {
            labels: @json($genderStats->pluck('name')),
            datasets: [{
                data: @json($genderStats->pluck('percentage')),
                backgroundColor: @json($genderStats->pluck('color'))
            }]
        };

        var familyStats = {
            labels: @json($familyStats->pluck('name')),
            datasets: [{
                data: @json($familyStats->pluck('percentage')),
                backgroundColor: @json($familyStats->pluck('color'))
            }]
        };

        var statusStats = {
            labels: @json($statusStats->pluck('name')),
            datasets: [{
                data: @json($statusStats->pluck('percentage')),
                backgroundColor: @json($statusStats->pluck('color'))
            }]
        };

        var colorStats = {
            labels: @json($colorStats->pluck('name')),
            datasets: [{
                data: @json($colorStats->pluck('percentage')),
                backgroundColor: @json($colorStats->pluck('color'))
            }]
        };

        var eyeStats = {
            labels: @json($eyeStats->pluck('name')),
            datasets: [{
                data: @json($eyeStats->pluck('percentage')),
                backgroundColor: @json($eyeStats->pluck('color'))
            }]
        };
        var optionpie = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false,
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };

        var genderChart = new Chart($('#genderStats'), {
            type: 'pie',
            data: genderStats,
            options: optionpie
        });

        var familyChart = new Chart($('#familyStats'), {
            type: 'pie',
            data: familyStats,
            options: optionpie
        });

        var statusChart = new Chart($('#statusStats'), {
            type: 'pie',
            data: statusStats,
            options: optionpie
        });

        var colorChart = new Chart($('#colorStats'), {
            type: 'pie',
            data: colorStats,
            options: optionpie
        });

        var eyeChart = new Chart($('#eyeStats'), {
            type: 'pie',
            data: eyeStats,
            options: optionpie
        });
    </script>
@endpush
