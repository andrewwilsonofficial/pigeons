@extends('layouts.master')
@section('title', __('Add a new pigeon'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Add a new pigeon') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Add a new pigeon') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <x-forms.pigeon />
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
