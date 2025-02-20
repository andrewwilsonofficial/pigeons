@extends('layouts.master')
@section('title', __('Edit team'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Edit team') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Edit team') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
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
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="{{ __('Enter name') }}" value="{{ old('name', $team->name) }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }}</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="{{ __('Enter description') }}" required>{{ old('description', $team->description) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="pigeons">{{ __('Pigeons') }}</label>
                                        <select class="form-control select2" data-placeholder="{{ __('Choose pigeons') }}"
                                            multiple id="pigeons" name="pigeons[]" required>
                                            <option value="">{{ __('Select pigeons') }}</option>
                                            @foreach ($pigeons as $pigeon)
                                                <option value="{{ $pigeon->id }}"
                                                    {{ in_array($pigeon->id, old('pigeons', $team->pigeons()->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                    {{ $pigeon->id }} - {{ $pigeon->band }}
                                                </option>
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
@endpush
