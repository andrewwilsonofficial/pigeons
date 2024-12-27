@extends('layouts.master')
@section('title', __('My loft'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('My loft') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('My loft') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('stations.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @foreach ($errors->all() as $error)
                                    <div class="col-12 mb-1">
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    </div>
                                @endforeach
                                <div class="col-12">
                                    <div id="map" style="width: 100%;height: 400px;"></div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="coordinate">{{ __('Coordinate') }}</label>
                                        <input type="text" class="form-control" id="location" name="location"
                                            placeholder="{{ __('Enter coordinate') }}" value="{{ old('coordinate') }}" readonly required>
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
        mapboxgl.accessToken = 'pk.eyJ1IjoiaWJyYWhpbXBocCIsImEiOiJja200dTRiZTQwODMzMnBxbDNvYWxvaWE0In0.8bVNmZQhKtQlPLDtKna_9A';
        var defaultCoordinates = [ -74.0059728000, 40.7127753000 ]; // default coordinates [lng, lat]
        var userCoordinates = @json(Auth::user()->myLoft ? [Auth::user()->myLoft->lng, Auth::user()->myLoft->lat] : null);
        var initialCoordinates = userCoordinates || defaultCoordinates;

        var map = new mapboxgl.Map({
            container: 'map', // container id
            style: 'mapbox://styles/mapbox/streets-v11',
            center: initialCoordinates, // starting position [lng, lat]
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

        let marker = null;
        if (userCoordinates) {
            marker = new mapboxgl.Marker()
                .setLngLat(userCoordinates)
                .addTo(map);
        }

        map.on('click', function(e) {
            mapClickFn(e.lngLat);

            if (marker == null) {
                marker = new mapboxgl.Marker()
                    .setLngLat(e.lngLat)
                    .addTo(map);
            } else {
                marker.setLngLat(e.lngLat);
            }
        });

        function mapClickFn(coordinates) {
            const url =
                "https://api.mapbox.com/geocoding/v5/mapbox.places/" +
                coordinates.lng +
                "," +
                coordinates.lat +
                ".json?access_token=" +
                mapboxgl.accessToken;

            document.getElementById("location").value = coordinates.lat + ',' + coordinates.lng;
        }
    </script>
@endpush
