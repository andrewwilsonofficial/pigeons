@extends('layouts.master')
@section('title', __('Dashboard'))

@section('content')
<!-- CONTAINER -->
    <div class="main-container container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('assets/images/map-pigeon.png') }}" alt="Map Pigeon" width="300" class="img-fluid">
                <h4>
                    {{ __('You are in the home page') }}
                </h4>
                <a class="btn btn-primary btn-lg" href="{{ route('pigeons.index') }}">
                    {{ __('My pigeons') }}
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection
