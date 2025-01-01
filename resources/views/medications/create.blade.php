@extends('layouts.master')
@section('title', __('Add a new medication'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Add a new medication') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Add a new medication') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('medications.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @foreach ($errors->all() as $error)
                                <div class="col-12 mb-1">
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    </div>
                                @endforeach
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="date">{{ __('Date') }}</label>
                                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="content">{{ __('Content') }}</label>
                                        <input type="text" class="form-control" id="content" name="content" placeholder="{{ __('Enter content') }}" value="{{ old('content') }}">
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
