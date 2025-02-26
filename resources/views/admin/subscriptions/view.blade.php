@extends('layouts.master')
@section('title', $planSubscriptionRequest->id)

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('View subscription request') }} - {{ $planSubscriptionRequest->id }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Details') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.subscription-requests.approve', $planSubscriptionRequest->id) }}"
                            method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="userName">{{ __('User') }}</label>
                                    <input type="text" id="userName" class="form-control"
                                        value="{{ $planSubscriptionRequest->user->name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="userEmail">{{ __('Email') }}</label>
                                    <input type="text" id="userEmail" class="form-control"
                                        value="{{ $planSubscriptionRequest->user->email }}" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label for="planId">{{ __('Plan') }}</label>
                                    <input type="text" id="planId" class="form-control"
                                        value="{{ $planSubscriptionRequest->plan->name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="paymentMethod">{{ __('Payment Method') }}</label>
                                    <input type="text" id="paymentMethod" class="form-control"
                                        value="{{ $planSubscriptionRequest->paymentMethod->name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="price">{{ __('Price') }}</label>
                                    <input type="text" id="price" class="form-control"
                                        value="{{ $planSubscriptionRequest->price }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="startDate">{{ __('Start Date') }}</label>
                                    <input type="date" id="startDate" name="start_date" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($planSubscriptionRequest->start_date)->format('Y-m-d') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="endDate">{{ __('End Date') }}</label>
                                    <input type="date" id="endDate" name="end_date" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($planSubscriptionRequest->end_date)->format('Y-m-d') }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="notes">{{ __('Notes') }}</label>
                                    <textarea id="notes" class="form-control" readonly>{{ $planSubscriptionRequest->notes }}</textarea>
                                </div>
                                <hr>
                                <div class="col-12 text-center">
                                    <h5>
                                        {{ __('Attachments') }}
                                    </h5>
                                    @foreach ($planSubscriptionRequest->attachments() as $attachment)
                                        <img src="{{ asset($attachment) }}" alt="Attachment" class="img-thumbnail">
                                    @endforeach
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Approve') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('admin.subscription-requests.reject', $planSubscriptionRequest->id) }}"
                            method="POST">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <h5>
                                        {{ __('Want to reject the request?') }}
                                    </h5>
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Reject') }}
                                    </button>
                                </div>
                            </div>
                        </form>
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
