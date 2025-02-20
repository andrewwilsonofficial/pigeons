@extends('layouts.master')
@section('title', __('Edit medication'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Edit medication') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Edit medication') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('medications.update', $medication->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @foreach ($errors->all() as $error)
                                <div class="col-12 mb-1">
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    </div>
                                @endforeach
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="medication_name">{{ __('Medication Name') }}</label>
                                        <input type="text" class="form-control" id="medication_name" name="medication_name" placeholder="{{ __('Enter medication name') }}" value="{{ old('medication_name', $medication->medication_name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="dosage">{{ __('Dosage') }}</label>
                                        <input type="text" class="form-control" id="dosage" name="dosage" placeholder="{{ __('Enter dosage') }}" value="{{ old('dosage', $medication->dosage) }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="date">{{ __('Date') }}</label>
                                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $medication->date) }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="comments">{{ __('Comments') }}</label>
                                        <textarea class="form-control" id="comments" name="comments" rows="3" placeholder="{{ __('Enter comments') }}">{{ old('comments', $medication->comments) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="pigeons">{{ __('Pigeons') }}</label>
                                        <select class="form-control select2" data-placeholder="{{ __('Choose pigeons') }}"
                                            multiple id="pigeons" name="pigeons[]" required>
                                            <option value="">{{ __('Select pigeons') }}</option>
                                            @foreach ($pigeons as $pigeon)
                                                <option value="{{ $pigeon->id }}"
                                                    {{ in_array($pigeon->id, old('pigeons', $medication->pigeons()->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                    {{ $pigeon->id }} - {{ $pigeon->band }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
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
