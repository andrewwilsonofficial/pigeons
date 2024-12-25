@extends('layouts.master')
@section('title', __('Add a new season'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Add a new season') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Add a new season') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('seasons.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @foreach ($errors->all() as $error)
                                <div class="col-12 mb-1">
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    </div>
                                @endforeach
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="{{ __('Enter name') }}" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }}</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="{{ __('Enter description') }}" required>{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="current_season"
                                            name="current_season" {{ old('current_season') ? 'checked' : '' }}>
                                        <span class="custom-control-label">{{ __('Current Season') }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="limit_timeframe"
                                            name="limit_timeframe" onclick="toggleDateFields()" {{ old('limit_timeframe') ? 'checked' : '' }}>
                                        <span
                                            class="custom-control-label">{{ __('Limit this season for a timeframe') }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row {{ old('limit_timeframe') ? '' : 'd-none' }}" id="date_fields">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_date">{{ __('Start Date') }}</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_date">{{ __('End Date') }}</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}">
                                        </div>
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
<script>
    function toggleDateFields() {
        var dateFields = document.getElementById('date_fields');
        var startDate = document.getElementById('start_date');
        var endDate = document.getElementById('end_date');
        
        if (dateFields.classList.contains('d-none')) {
            dateFields.classList.remove('d-none');
            startDate.setAttribute('required', 'required');
            endDate.setAttribute('required', 'required');
        } else {
            dateFields.classList.add('d-none');
            startDate.removeAttribute('required');
            endDate.removeAttribute('required');
        }
    }
</script>
@endpush
