@extends('layouts.master')
@section('title', __('Edit race'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Edit race') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Edit race') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('races.update', $race->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @foreach ($errors->all() as $error)
                                <div class="col-12 mb-1">
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    </div>
                                @endforeach
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Enter name') }}" value="{{ old('name', $race->name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }}</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="{{ __('Enter description') }}" value="{{ old('description', $race->description) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">{{ __('Type') }}</label>
                                        <select class="form-control" id="type" name="type">
                                            <option value="">{{ __('Select type') }}</option>
                                            <option value="one-loft" {{ old('type', $race->type) == 'one-loft' ? 'selected' : '' }}>{{ __('One-loft') }}</option>
                                            <option value="futurity" {{ old('type', $race->type) == 'futurity' ? 'selected' : '' }}>{{ __('Futurity') }}</option>
                                            <option value="club" {{ old('type', $race->type) == 'club' ? 'selected' : '' }}>{{ __('Club') }}</option>
                                            <option value="combine" {{ old('type', $race->type) == 'combine' ? 'selected' : '' }}>{{ __('Combine') }}</option>
                                            <option value="federation" {{ old('type', $race->type) == 'federation' ? 'selected' : '' }}>{{ __('Federation') }}</option>
                                            <option value="training" {{ old('type', $race->type) == 'training' ? 'selected' : '' }}>{{ __('Training') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">{{ __('Date') }}</label>
                                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $race->date) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="club_name">{{ __('Club Name') }}</label>
                                        <input type="text" class="form-control" id="club_name" name="club_name" placeholder="{{ __('Enter club name') }}" value="{{ old('club_name', $race->club_name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="club_number">{{ __('Club Number') }}</label>
                                        <input type="text" class="form-control" id="club_number" name="club_number" placeholder="{{ __('Enter club number') }}" value="{{ old('club_number', $race->club_number) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="club_location">{{ __('Club Location') }}</label>
                                        <input type="text" class="form-control" id="club_location" name="club_location" placeholder="{{ __('Enter club location') }}" value="{{ old('club_location', $race->club_location) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="combine_name">{{ __('Combine Name') }}</label>
                                        <input type="text" class="form-control" id="combine_name" name="combine_name" placeholder="{{ __('Enter combine name') }}" value="{{ old('combine_name', $race->combine_name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="release_point_name">{{ __('Release Point Name') }}</label>
                                        <input type="text" class="form-control" id="release_point_name" name="release_point_name" placeholder="{{ __('Enter release point name') }}" value="{{ old('release_point_name', $race->release_point_name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="release_longitude">{{ __('Release Longitude') }}</label>
                                        <input type="text" class="form-control" id="release_longitude" name="release_longitude" placeholder="{{ __('Enter release longitude') }}" value="{{ old('release_longitude', $race->release_longitude) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="release_latitude">{{ __('Release Latitude') }}</label>
                                        <input type="text" class="form-control" id="release_latitude" name="release_latitude" placeholder="{{ __('Enter release latitude') }}" value="{{ old('release_latitude', $race->release_latitude) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="destination_point_name">{{ __('Destination Point Name') }}</label>
                                        <input type="text" class="form-control" id="destination_point_name" name="destination_point_name" placeholder="{{ __('Enter destination point name') }}" value="{{ old('destination_point_name', $race->destination_point_name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="destination_longitude">{{ __('Destination Longitude') }}</label>
                                        <input type="text" class="form-control" id="destination_longitude" name="destination_longitude" placeholder="{{ __('Enter destination longitude') }}" value="{{ old('destination_longitude', $race->destination_longitude) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="destination_latitude">{{ __('Destination Latitude') }}</label>
                                        <input type="text" class="form-control" id="destination_latitude" name="destination_latitude" placeholder="{{ __('Enter destination latitude') }}" value="{{ old('destination_latitude', $race->destination_latitude) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="release_temperature">{{ __('Release Temperature') }}</label>
                                        <input type="text" class="form-control" id="release_temperature" name="release_temperature" placeholder="{{ __('Enter release temperature') }}" value="{{ old('release_temperature', $race->release_temperature) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="release_weather">{{ __('Release Weather') }}</label>
                                        <input type="text" class="form-control" id="release_weather" name="release_weather" placeholder="{{ __('Enter release weather') }}" value="{{ old('release_weather', $race->release_weather) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="release_notes">{{ __('Release Notes') }}</label>
                                        <input type="text" class="form-control" id="release_notes" name="release_notes" placeholder="{{ __('Enter release notes') }}" value="{{ old('release_notes', $race->release_notes) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="destination_temperature">{{ __('Destination Temperature') }}</label>
                                        <input type="text" class="form-control" id="destination_temperature" name="destination_temperature" placeholder="{{ __('Enter destination temperature') }}" value="{{ old('destination_temperature', $race->destination_temperature) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="destination_weather">{{ __('Destination Weather') }}</label>
                                        <input type="text" class="form-control" id="destination_weather" name="destination_weather" placeholder="{{ __('Enter destination weather') }}" value="{{ old('destination_weather', $race->destination_weather) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="destination_notes">{{ __('Destination Notes') }}</label>
                                        <input type="text" class="form-control" id="destination_notes" name="destination_notes" placeholder="{{ __('Enter destination notes') }}" value="{{ old('destination_notes', $race->destination_notes) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="total_birds">{{ __('Total Birds') }}</label>
                                        <input type="text" class="form-control" id="total_birds" name="total_birds" placeholder="{{ __('Enter total birds') }}" value="{{ old('total_birds', $race->total_birds) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="total_lofts">{{ __('Total Lofts') }}</label>
                                        <input type="text" class="form-control" id="total_lofts" name="total_lofts" placeholder="{{ __('Enter total lofts') }}" value="{{ old('total_lofts', $race->total_lofts) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="release_time">{{ __('Release Time') }}</label>
                                        <input type="datetime-local" class="form-control" id="release_time" name="release_time" value="{{ old('release_time', $race->release_time) }}">
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
