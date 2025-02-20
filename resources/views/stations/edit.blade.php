@extends('layouts.master')
@section('title', __('Edit station'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Edit station') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Edit station') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('stations.update', $station->id) }}" method="POST"
                            enctype="multipart/form-data">
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
                                        <label for="station_name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="station_name" name="station_name"
                                            placeholder="{{ __('Enter name') }}"
                                            value="{{ old('station_name', $station->station_name) }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="location_name">{{ __('Location name') }}</label>
                                        <input type="text" class="form-control" id="location_name" name="location_name"
                                            placeholder="{{ __('Enter location name') }}"
                                            value="{{ old('location_name', $station->location_name) }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div id="map" style="width: 100%;height: 400px;"></div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="coordinate">{{ __('Coordinate') }}</label>
                                        <input type="text" class="form-control" id="location" name="location"
                                            placeholder="{{ __('Enter coordinate') }}"
                                            value="{{ old('location', $station->latitude . ',' . $station->longitude) }}"
                                            readonly required>
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
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js'></script>

    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css">
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <script>
        mapboxgl.accessToken =
            'pk.eyJ1IjoiaWJyYWhpbXBocCIsImEiOiJja200dTRiZTQwODMzMnBxbDNvYWxvaWE0In0.8bVNmZQhKtQlPLDtKna_9A';
        var map = new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [{{ $station->latitude . ',' . $station->longitude }}], // starting position [lng, lat]
            zoom: 9 // starting zoom
        });

        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            marker: false,
            zoom: 20
        });

        map.addControl(
            geocoder
        );

        let marker = new mapboxgl.Marker()
            .setLngLat([{{ $station->latitude . ',' . $station->longitude }}])
            .addTo(map);

        map.on('click', function(e) {
            mapClickFn(e.lngLat);

            if (marker == null) {
                marker = new mapboxgl.Marker()
                    .setLngLat(e.lngLat)
                    .addTo(map);
            } else {
                marker.setLngLat(e.lngLat)
            }
        });

        function mapClickFn(coordinates) {
            const url =
                "https://api.mapbox.com/geocoding/v5/mapbox.places/" +
                coordinates.lng +
                "," +
                coordinates.lat +
                ".json?access_token=" +
                mapboxgl.accessToken

            document.getElementById("location").value = coordinates.lat + ',' + coordinates.lng;
        }
    </script>
@endpush
