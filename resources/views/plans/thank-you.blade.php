@extends('layouts.master')
@section('title', __('Thank you'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Thank you') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Thank you') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <p>
                                    {{ __('Thank you for your purchase.') }}
                                </p>
                                <img src="{{ asset('assets/images/thank-you.webp') }}" alt="Thank you" width="400">
                                <p class="mt-3">
                                    {{ __('Your subscription will be active after payment confirmation.') }}
                                </p>
                                <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                                    {{ __('Go to dashboard') }}
                                </a>
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
@endpush
