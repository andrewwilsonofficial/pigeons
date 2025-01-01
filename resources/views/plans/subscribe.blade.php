@extends('layouts.master')
@section('title', $plan->name)

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Subscribe') }} - {{ $plan->name }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ $plan->name }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <p>
                                    We appreciate your business. Please complete your purchase below.
                                </p>
                                <p>
                                    <strong>Plan:</strong> {{ $plan->name }}<br>
                                    <strong>Price:</strong> {{ $plan->price }}<br>
                                    <strong>Duration:</strong> {{ $plan->duration }} days<br>
                                </p>
                                <span>
                                    {{ $plan->description }}
                                </span>
                                <div class="row">
                                    @foreach ($payment_methods as $payment_method)
                                        <div class="col-md-6 col-12">
                                            <div class="accordion mt-3"
                                                id="paymentMethodsAccordion{{ $payment_method->id }}">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading{{ $payment_method->id }}">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ $payment_method->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="collapse{{ $payment_method->id }}">
                                                            <img src="{{ asset('assets/images/' . $payment_method->icon) }}"
                                                                width="24" alt="{{ $payment_method->name }} icon"
                                                                class="me-2">
                                                            {{ $payment_method->name }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ $payment_method->id }}"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="heading{{ $payment_method->id }}"
                                                        data-bs-parent="#paymentMethodsAccordion{{ $payment_method->id }}">
                                                        <div class="accordion-body">
                                                            {{ $payment_method->description }}
                                                            <form
                                                                action="{{ route('plans.processSubscription', $plan->id) }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="payment_method_id"
                                                                    value="{{ $payment_method->id }}">
                                                                <div class="mb-3">
                                                                    <label for="payment_date_{{ $payment_method->id }}" class="form-label mt-3">
                                                                        {{ __('Payment Date') }}
                                                                    </label>
                                                                    <input id="payment_date_{{ $payment_method->id }}" type="date"
                                                                        name="payment_date" class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="notes_{{ $payment_method->id }}" class="form-label mt-3">
                                                                        {{ __('Payment Details') }}
                                                                    </label>
                                                                    <textarea id="notes_{{ $payment_method->id }}" name="notes" class="form-control"
                                                                        placeholder="{{ __('Write all the payment details you made here') }}"></textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="attachments_{{ $payment_method->id }}" class="form-label mt-3">
                                                                        {{ __('Attach anything related to the payment') }}
                                                                    </label>
                                                                    <input id="attachments_{{ $payment_method->id }}" type="file"
                                                                        name="attachments[]" class="form-control"
                                                                        accept=".jpg,.jpeg,.png,.pdf">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary mt-3">
                                                                    Subscribe with {{ $payment_method->name }}
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
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
