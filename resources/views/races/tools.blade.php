@extends('layouts.master')
@section('title', __('Race tools'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Race tools') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Linear Distance (As The Crow Flies)') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <p>
                                    {{ __('This calculator factors in Earth\'s curvature. Use decimal degress (DDD.DDDDD).') }}
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h3>
                                    {{ __('Start Coordinates') }}
                                </h3>
                                <div class="form-group">
                                    <label for="start_lat">
                                        {{ __('Latitude') }}
                                    </label>
                                    <input class="form-control" id="start_lat" name="start_lat" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="start_lon">
                                        {{ __('Longitude') }}
                                    </label>
                                    <input class="form-control" id="start_lon" name="start_lon" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3>
                                    {{ __('End Coordinates') }}
                                </h3>
                                <div class="form-group">
                                    <label for="end_lat">
                                        {{ __('Latitude') }}
                                    </label>
                                    <input class="form-control" id="end_lat" name="end_lat" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="end_lon">
                                        {{ __('Longitude') }}
                                    </label>
                                    <input class="form-control" id="end_lon" name="end_lon" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3>
                                    {{ __('Results') }}
                                </h3>
                                <div class="form-group mb-0 mt-5">
                                    <p id="distance_km" name="distance_km" class="form-control-plaintext">
                                        {{ __('Distance (km)') }}:
                                    </p>
                                </div>
                                <div class="form-group mb-0">
                                    <p id="distance_m" name="distance_m" class="form-control-plaintext">
                                        {{ __('Distance (metres)') }}:
                                    </p>
                                </div>
                                <div class="form-group mb-0">
                                    <p id="distance_mi" name="distance_mi" class="form-control-plaintext">
                                        {{ __('Distance (miles)') }}:
                                    </p>
                                </div>
                                <div class="form-group mb-0">
                                    <p id="distance_yd" name="distance_yd" class="form-control-plaintext">
                                        {{ __('Distance (yards)') }}:
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button id="calculate_distance" class="btn btn-primary mt-4">
                                    {{ __('Calculate Distance') }}
                                    <i class="fa fa-calculator"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Average Speed Calculator') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>
                                    {{ __('Distance Traveled') }}
                                </h3>
                                <div class="form-group">
                                    <label for="distance_traveled">
                                        {{ __('Distance') }}
                                    </label>
                                    <input class="form-control" id="distance_traveled" name="distance_traveled" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="distance_units">
                                        {{ __('Units') }}
                                    </label>
                                    <select class="form-control" id="distance_units" name="distance_units">
                                        <option value="km">
                                            {{ __('Kilometres') }}
                                        </option>
                                        <option value="metres">
                                            {{ __('Metres') }}
                                        </option>
                                        <option value="miles">
                                            {{ __('Miles') }}
                                        </option>
                                        <option value="yards">
                                            {{ __('Yards') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3>
                                    {{ __('Duration of Travel') }}
                                </h3>
                                <div class="form-group">
                                    <label for="hours">
                                        {{ __('Hours') }}
                                    </label>
                                    <input class="form-control" id="hours" name="hours" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="minutes">
                                        {{ __('Minutes') }}
                                    </label>
                                    <input class="form-control" id="minutes" name="minutes" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="seconds">
                                        {{ __('Seconds') }}
                                    </label>
                                    <input class="form-control" id="seconds" name="seconds" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3>
                                    {{ __('Results') }}
                                </h3>
                                <div class="form-group">
                                    <p id="speed_mph" name="speed_mph" class="form-control-plaintext">
                                        {{ __('Speed (mph)') }}:
                                    </p>
                                    <p id="speed_kmh" name="speed_kmh" class="form-control-plaintext">
                                        {{ __('Speed (km/h)') }}:
                                    </p>
                                    <p id="speed_mps" name="speed_mps" class="form-control-plaintext">
                                        {{ __('Speed (m/s)') }}:
                                    </p>
                                    <p id="speed_fpm" name="speed_fpm" class="form-control-plaintext">
                                        {{ __('Speed (fpm)') }}:
                                    </p>
                                    <p id="speed_ypm" name="speed_ypm" class="form-control-plaintext">
                                        {{ __('Speed (ypm)') }}:
                                    </p>
                                    <p id="speed_mpm" name="speed_mpm" class="form-control-plaintext">
                                        {{ __('Speed (mpm)') }}:
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button id="calculate_speed" class="btn btn-primary mt-4">
                                    {{ __('Calculate Speed') }}
                                    <i class="fa fa-calculator"></i>
                                </button>
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
<script>
    // Calculate distance between two points offline using js
    function calculateDistance(lat1, lon1, lat2, lon2) {
        var R = 6371; // km
        var dLat = (lat2 - lat1).toRad();
        var dLon = (lon2 - lon1).toRad();
        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c;
        return d;
    }

    // Converts numeric degrees to radians
    if (typeof Number.prototype.toRad === 'undefined') {
        Number.prototype.toRad = function () {
            return this * Math.PI / 180;
        }
    }

    // Calculate distance
    $('#calculate_distance').on('click', function () {
        var start_lat = parseFloat($('#start_lat').val());
        var start_lon = parseFloat($('#start_lon').val());
        var end_lat = parseFloat($('#end_lat').val());
        var end_lon = parseFloat($('#end_lon').val());

        if (isNaN(start_lat) || isNaN(start_lon) || isNaN(end_lat) || isNaN(end_lon)) {
            alert('Please enter valid coordinates');
            return;
        }

        var distance_km = calculateDistance(start_lat, start_lon, end_lat, end_lon);
        var distance_m = distance_km * 1000;
        var distance_mi = distance_km * 0.621371;
        var distance_yd = distance_km * 1093.61;

        $('#distance_km').text('Distance (km): ' + distance_km.toFixed(2));
        $('#distance_m').text('Distance (metres): ' + distance_m.toFixed(2));
        $('#distance_mi').text('Distance (miles): ' + distance_mi.toFixed(2));
        $('#distance_yd').text('Distance (yards): ' + distance_yd.toFixed(2));
    });
</script>
<script>
    // Calculate speed
    $('#calculate_speed').on('click', function () {
        var distance_traveled = parseFloat($('#distance_traveled').val());
        var distance_units = $('#distance_units').val();
        var hours = parseFloat($('#hours').val());
        var minutes = parseFloat($('#minutes').val());
        var seconds = parseFloat($('#seconds').val());

        if (isNaN(distance_traveled) || isNaN(hours) || isNaN(minutes) || isNaN(seconds)) {
            alert('Please enter valid values');
            return;
        }

        var total_seconds = (hours * 3600) + (minutes * 60) + seconds;
        var total_hours = total_seconds / 3600;

        var distance_km;
        switch (distance_units) {
            case 'km':
                distance_km = distance_traveled;
                break;
            case 'metres':
                distance_km = distance_traveled / 1000;
                break;
            case 'miles':
                distance_km = distance_traveled * 1.60934;
                break;
            case 'yards':
                distance_km = distance_traveled * 0.0009144;
                break;
            default:
                alert('Invalid distance unit');
                return;
        }

        var speed_kmh = distance_km / total_hours;
        var speed_mph = speed_kmh / 1.60934;
        var speed_mps = speed_kmh / 3.6;
        var speed_fpm = speed_mph * 88;
        var speed_ypm = speed_mph * 1760;
        var speed_mpm = speed_kmh * 1000 / 60;

        $('#speed_mph').text('Speed (mph): ' + speed_mph.toFixed(2));
        $('#speed_kmh').text('Speed (km/h): ' + speed_kmh.toFixed(2));
        $('#speed_mps').text('Speed (m/s): ' + speed_mps.toFixed(2));
        $('#speed_fpm').text('Speed (fpm): ' + speed_fpm.toFixed(2));
        $('#speed_ypm').text('Speed (ypm): ' + speed_ypm.toFixed(2));
        $('#speed_mpm').text('Speed (mpm): ' + speed_mpm.toFixed(2));
    });
</script>
@endpush
