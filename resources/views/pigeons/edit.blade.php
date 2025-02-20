@extends('layouts.master')
@section('title', __('Edit pigeon'))

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">
                {{ __('Edit pigeon') }}
            </h1>
        </div>
        <!-- PAGE-HEADER END -->
        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Edit pigeon') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pigeons.update', $pigeon->id) }}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Enter name') }}" value="{{ old('name', $pigeon->name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="band">{{ __('Band') }}</label>
                                        <input type="text" class="form-control" id="band" name="band" placeholder="{{ __('Enter band') }}" value="{{ old('band', $pigeon->band) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="second_band">{{ __('Second Band') }}</label>
                                        <input type="text" class="form-control" id="second_band" name="second_band" placeholder="{{ __('Enter second band') }}" value="{{ old('second_band', $pigeon->second_band) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color_description">{{ __('Color Description') }}</label>
                                        <input type="text" class="form-control" id="color_description" name="color_description" placeholder="{{ __('Enter color description') }}" value="{{ old('color_description', $pigeon->color_description) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location">{{ __('Location') }}</label>
                                        <input type="text" class="form-control" id="location" name="location" placeholder="{{ __('Enter location') }}" value="{{ old('location', $pigeon->location) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="family">{{ __('Family') }}</label>
                                        <input type="text" class="form-control" id="family" name="family" placeholder="{{ __('Enter family') }}" value="{{ old('family', $pigeon->family) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_owner">{{ __('Last Owner') }}</label>
                                        <input type="text" class="form-control" id="last_owner" name="last_owner" placeholder="{{ __('Enter last owner') }}" value="{{ old('last_owner', $pigeon->last_owner) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rating">{{ __('Rating') }}</label>
                                        <input type="number" class="form-control" id="rating" name="rating" placeholder="{{ __('Enter rating') }}" value="{{ old('rating', $pigeon->rating) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color">{{ __('Color') }}</label>
                                        <input type="text" class="form-control" id="color" name="color" placeholder="{{ __('Enter color') }}" value="{{ old('color', $pigeon->color) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="eye">{{ __('Eye') }}</label>
                                        <input type="text" class="form-control" id="eye" name="eye" placeholder="{{ __('Enter eye') }}" value="{{ old('eye', $pigeon->eye) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="leg">{{ __('Leg') }}</label>
                                        <input type="text" class="form-control" id="leg" name="leg" placeholder="{{ __('Enter leg') }}" value="{{ old('leg', $pigeon->leg) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="markings">{{ __('Markings') }}</label>
                                        <input type="text" class="form-control" id="markings" name="markings" placeholder="{{ __('Enter markings') }}" value="{{ old('markings', $pigeon->markings) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}</label>
                                        <input type="text" class="form-control" id="status" name="status" placeholder="{{ __('Enter status') }}" value="{{ old('status', $pigeon->status) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sex">{{ __('Sex') }}</label>
                                        <select class="form-control" id="sex" name="sex">
                                            <option value="unknown" {{ old('sex', $pigeon->sex) == 'unknown' ? 'selected' : '' }}>{{ __('Unknown') }}</option>
                                            <option value="cock" {{ old('sex', $pigeon->sex) == 'cock' ? 'selected' : '' }}>{{ __('Cock') }}</option>
                                            <option value="hen" {{ old('sex', $pigeon->sex) == 'hen' ? 'selected' : '' }}>{{ __('Hen') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label for="sire">
                                        {{ __('Sire') }}
                                    </label>
                                    <select class="form-control select2-show-search" data-placeholder="{{ __('Choose sire') }}" id="sire" name="sire_id">
                                        <option value="">{{ __('Select sire') }}</option>
                                        @foreach ($sires as $sire)
                                            <option value="{{ $sire->id }}"
                                                {{ old('sire', $pigeon->sire->id) == $sire->id ? 'selected' : '' }}>
                                                {{ $sire->band }} - {{ $sire->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="dam">
                                        {{ __('Dam') }}
                                    </label>
                                    <select class="form-control select2-show-search" data-placeholder="{{ __('Choose dam') }}" id="dam" name="dam_id">
                                        <option value="">{{ __('Select dam') }}</option>
                                        @foreach ($dams as $dam)
                                            <option value="{{ $dam->id }}"
                                                {{ old('dam', $pigeon->dam->id) == $dam->id ? 'selected' : '' }}>
                                                {{ $dam->band }} - {{ $dam->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="notes">{{ __('Notes') }}</label>
                                        <textarea class="form-control" id="notes" name="notes" placeholder="{{ __('Enter notes') }}">{{ old('notes', $pigeon->notes) }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="date_hatched">{{ __('Date Hatched') }}</label>
                                        <input type="date" class="form-control" id="date_hatched" name="date_hatched" value="{{ old('date_hatched', $pigeon->date_hatched) }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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
