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
                        <form action="{{ route('pigeons.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @foreach ($errors->all() as $error)
                                <div class="col-12 mb-1">
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    </div>
                                @endforeach
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Enter name') }}" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="band">{{ __('Band') }}</label>
                                        <input type="text" class="form-control" id="band" name="band" placeholder="{{ __('Enter band') }}" value="{{ old('band') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="second_band">{{ __('Second Band') }}</label>
                                        <input type="text" class="form-control" id="second_band" name="second_band" placeholder="{{ __('Enter second band') }}" value="{{ old('second_band') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color_description">{{ __('Color Description') }}</label>
                                        <input type="text" class="form-control" id="color_description" name="color_description" placeholder="{{ __('Enter color description') }}" value="{{ old('color_description') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location">{{ __('Location') }}</label>
                                        <input type="text" class="form-control" id="location" name="location" placeholder="{{ __('Enter location') }}" value="{{ old('location') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="family">{{ __('Family') }}</label>
                                        <input type="text" class="form-control" id="family" name="family" placeholder="{{ __('Enter family') }}" value="{{ old('family') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_owner">{{ __('Last Owner') }}</label>
                                        <input type="text" class="form-control" id="last_owner" name="last_owner" placeholder="{{ __('Enter last owner') }}" value="{{ old('last_owner') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rating">{{ __('Rating') }}</label>
                                        <input type="number" class="form-control" id="rating" name="rating" placeholder="{{ __('Enter rating') }}" value="{{ old('rating') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color">{{ __('Color') }}</label>
                                        <input type="text" class="form-control" id="color" name="color" placeholder="{{ __('Enter color') }}" value="{{ old('color') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eye">{{ __('Eye') }}</label>
                                        <input type="text" class="form-control" id="eye" name="eye" placeholder="{{ __('Enter eye') }}" value="{{ old('eye') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="leg">{{ __('Leg') }}</label>
                                        <input type="text" class="form-control" id="leg" name="leg" placeholder="{{ __('Enter leg') }}" value="{{ old('leg') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="markings">{{ __('Markings') }}</label>
                                        <input type="text" class="form-control" id="markings" name="markings" placeholder="{{ __('Enter markings') }}" value="{{ old('markings') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}</label>
                                        <input type="text" class="form-control" id="status" name="status" placeholder="{{ __('Enter status') }}" value="{{ old('status') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sex">{{ __('Sex') }}</label>
                                        <select class="form-control" id="sex" name="sex">
                                            <option value="unknown" {{ old('sex') == 'unknown' ? 'selected' : '' }}>{{ __('Unknown') }}</option>
                                            <option value="cock" {{ old('sex') == 'cock' ? 'selected' : '' }}>{{ __('Cock') }}</option>
                                            <option value="hen" {{ old('sex') == 'hen' ? 'selected' : '' }}>{{ __('Hen') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="notes">{{ __('Notes') }}</label>
                                        <textarea class="form-control" id="notes" name="notes" placeholder="{{ __('Enter notes') }}">{{ old('notes') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="date_hatched">{{ __('Date Hatched') }}</label>
                                        <input type="date" class="form-control" id="date_hatched" name="date_hatched" value="{{ old('date_hatched') }}">
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
