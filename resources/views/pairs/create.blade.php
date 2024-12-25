@extends('layouts.master')
@section('title', __('Add a new pair'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Add a new pair') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Add a new pair') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pairs.store') }}" method="POST" enctype="multipart/form-data">
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="date_paired">{{ __('Date paired') }}</label>
                                        <input type="date" class="form-control" id="date_paired" name="date_paired" value="{{ old('date_paired') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="date_paired">{{ __('Date separated') }}</label>
                                        <input type="date" class="form-control" id="date_separated" name="date_separated" value="{{ old('date_separated') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="season">{{ __('Season') }}</label>
                                        <select class="form-control" id="season" name="season_id" required>
                                            <option value="">{{ __('Select season') }}</option>
                                            @foreach($seasons as $season)
                                                <option value="{{ $season->id }}" {{ old('season') == $season->id ? 'selected' : '' }}>{{ $season->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="cock">{{ __('Cock') }}</label>
                                        <select class="form-control" id="cock" name="cock_id" required>
                                            <option value="">{{ __('Select cock') }}</option>
                                            @foreach($cocks as $cock)
                                                <option value="{{ $cock->id }}" {{ old('cock') == $cock->id ? 'selected' : '' }}>{{ $cock->band }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="hen">{{ __('Hen') }}</label>
                                        <select class="form-control" id="hen" name="hen_id" required>
                                            <option value="">{{ __('Select hen') }}</option>
                                            @foreach($hens as $hen)
                                                <option value="{{ $hen->id }}" {{ old('hen') == $hen->id ? 'selected' : '' }}>{{ $hen->band }}</option>
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
