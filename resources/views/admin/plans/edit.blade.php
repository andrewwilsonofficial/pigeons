@extends('layouts.master')
@section('title', __('Edit plan'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Edit plan') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Edit plan') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.plans.update', $plan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @foreach ($errors->all() as $error)
                                <div class="col-12 mb-1">
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    </div>
                                @endforeach
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Enter name') }}" value="{{ old('name', $plan->name) }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price">{{ __('Price') }}</label>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="{{ __('Enter price') }}" value="{{ old('price', $plan->price) }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="duration">{{ __('Duration') }}</label>
                                        <input type="text" class="form-control" id="duration" name="duration" placeholder="{{ __('Enter duration') }}" value="{{ old('duration', $plan->duration) }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }}</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="{{ __('Enter description') }}" value="{{ old('description', $plan->description) }}">
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
